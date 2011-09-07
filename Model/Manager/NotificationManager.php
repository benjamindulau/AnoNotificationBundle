<?php

namespace Ano\Bundle\NotificationBundle\Manager;

use Ano\Bundle\NotificationBundle\Model\Manager\NotificationManagerInterface;
use Ano\Bundle\NotificationBundle\Repository\NotificationRepositoryInterface;
use Ano\Bundle\NotificationBundle\Notifier\NotifierInterface;
use Ano\Bundle\NotificationBundle\Model\Notification;

class NotificationManager implements  NotificationManagerInterface
{
    protected $notificationRepository;

    protected $notifiers = array();

    public function __construct(NotificationRepositoryInterface $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function addNotification(Notification $notification)
    {
        $subject = $notification->getSubject();
        $recipient = $notification->getRecipient();
        if ($recipient->wantsNotificationFor($subject->getNotificationSubjectName())) {
            $this->notificationRepository->save($notification);

            foreach ($recipient->getNotifierList() as $notifierName) {
                if ($this->hasNotifier($notifierName)) {
                    $this->notifiers[$notifierName]->notify($notification);
                }
            }
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