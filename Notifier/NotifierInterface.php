<?php

namespace Ano\Bundle\NotificationBundle\Notifier;

use Ano\Bundle\NotificationBundle\Model\Notification;

interface NotifierInterface
{
    /**
     * @param Notification $notification
     * @return void
     */
    public function notify(Notification $notification);

    /**
     * @return string
     */
    public function getName();
}