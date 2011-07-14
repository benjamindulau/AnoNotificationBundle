<?php

namespace Ano\Bundle\NotificationBundle\Model;

interface NotificationSubscriberInterface
{
    /**
     * @return array of Notification
     */
    public function getNotifications();
}