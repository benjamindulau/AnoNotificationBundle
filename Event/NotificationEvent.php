<?php

namespace Ano\Bundle\NotificationBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Ano\Bundle\NotificationBundle\Model\Notification;
use Ano\Bundle\NotificationBundle\Model\NotificationSubscriberInterface;
use Ano\Bundle\NotificationBundle\Notifier\NotifierInterface;

class NotificationEvent extends Event
{
    protected $notification;
    protected $notifier;
    protected $recipient;


    public function __construct(
        Notification $notification,
        NotificationSubscriberInterface $notifier,
        NotificationSubscriberInterface $recipient
    )
    {
        $this->notification = $notification;
        $this->notifier = $notifier;
        $this->recipient = $recipient;
    }

    /**
     * @return \Ano\Bundle\NotificationBundle\Model\Notification
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * @return \Ano\Bundle\NotificationBundle\Model\NotificationSubscriberInterface
     */
    public function getNotifier()
    {
        return $this->notifier;
    }

    /**
     * @return \Ano\Bundle\NotificationBundle\Model\NotificationSubscriberInterface
     */
    public function getRecipient()
    {
        return $this->recipient;
    }


}
