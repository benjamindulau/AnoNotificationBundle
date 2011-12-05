<?php

namespace Ano\Bundle\NotificationBundle\Model;

use Ano\Bundle\NotificationBundle\Model\Notification;

interface NotificationSubscriberInterface
{
    /**
     * @return array of Notification
     */
    public function getNotifications();

    /***
     * @return boolean
     */
    public function wantsNotificationFor($threadId);

    /**
     * @return array
     */
    public function getNotifierList();

    /**
     * @return string
     */
    public function getNotifierName();

    /**
     * @return void
     */
    public function incUnreadNotificationCount(Notification $notification);

    /**
     * @return void
     */
    public function decUnreadNotificationCount(Notification $notification);

    /**
     * @return integer
     */
    public function getUnreadNotificationCount();

    /**
     * @return boolean
     */
    public function hasUnreadNotifications();
}