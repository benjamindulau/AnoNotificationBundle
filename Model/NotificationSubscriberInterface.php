<?php

namespace Ano\Bundle\NotificationBundle\Model;

interface NotificationSubscriberInterface
{
    /**
     * @return array of Notification
     */
    public function getNotifications();

    /***
     * @return boolean
     */
    public function wantsNotificationFor($targetName);
}