<?php

namespace Ano\Bundle\NotificationBundle\Model\Manager;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Ano\Bundle\NotificationBundle\Repository\NotificationRepositoryInterface;
use Ano\Bundle\NotificationBundle\Notifier\NotifierInterface;
use Ano\Bundle\NotificationBundle\Model\Notification;
use Ano\Bundle\NotificationBundle\AnoNotificationEvents;
use Ano\Bundle\NotificationBundle\Event\NotificationEvent;
use Ano\Bundle\NotificationBundle\Model\NotificationTargetInterface;
use Ano\Bundle\NotificationBundle\Model\NotificationSubscriberInterface;

class NotificationManager implements NotificationManagerInterface
{
    protected $notificationRepository;
    protected $notifiers = array();
    protected $dispatcher;

    public function __construct(
        NotificationRepositoryInterface $notificationRepository,
        EventDispatcherInterface $dispatcher
    )
    {
        $this->notificationRepository = $notificationRepository;
        $this->dispatcher = $dispatcher;
    }

    /**
     * {@inheritDoc}
     */
    public function addNotification(Notification $notification)
    {
        $thread = $notification->getThreadId();
        $recipient = $notification->getRecipient();
        if ($recipient->wantsNotificationFor($thread)) {
            $recipient->incUnreadNotificationCount($notification);
            $this->notificationRepository->save($notification);

            $event = new NotificationEvent($notification, $notification->getNotifier(), $recipient);
            $this->dispatcher->dispatch(AnoNotificationEvents::POST_SAVE, $event);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function readNotifications(NotificationSubscriberInterface $subscriber, NotificationTargetInterface $target = null)
    {
        if (null !== $target) {
            $notifications = $this->notificationRepository->findUnreadForSubscriberAndTarget($subscriber, $target);
        }
        else {
            $notifications = $this->notificationRepository->findUnreadForSubscriber($subscriber);
        }

        foreach($notifications as $notification) {
            $notification->markRead();
            if ($notification->getRecipient()->wantsNotificationFor($notification->getThreadId())) {
                $notification->getRecipient()->decUnreadNotificationCount($notification);
            }
            $this->notificationRepository->save($notification);

//            $event = new NotificationEvent($notification, $notification->getNotifier(), $notification->getRecipient());
//            $this->dispatcher->dispatch(AnoNotificationEvents::POST_READ, $event);
        }
    }


    /**
     * @param array $notifiers
     * @return void
     */
    public function setNotifiers(array $notifiers)
    {
        $this->notifiers = $notifiers;
    }

    /**
     * @return array
     */
    public function getNotifiers()
    {
        return $this->notifiers;
    }

    /**
     * @param NotifierInterface $notifier
     * @return void
     */
    public function addNotifier(NotifierInterface $notifier)
    {
        $this->notifiers[] = $notifier;
    }

    /**
     * @param string $notifierName
     * @return bool
     */
    public function hasNotifier($notifierName)
    {
        return isset($this->notifiers[$notifierName]);
    }
}