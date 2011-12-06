<?php

/**
 * This file is part of the AnoNotificationBundle
 *
 * (c) anonymation <contact@anonymation.com>
 *
 */

namespace Ano\Bundle\NotificationBundle\Model\Manager;

use Ano\Bundle\NotificationBundle\Model\NotificationSubscriberInterface;
use Ano\Bundle\NotificationBundle\Model\NotificationTargetInterface;
use Ano\Bundle\NotificationBundle\Model\Notification;

/**
 * Notification Manager.
 *
 * @author Benjamin Dulau <benjamin.dulau@anonymation.com>
 */
interface NotificationManagerInterface
{
    /**
     * Creates a new notification
     *
     * @param  Notification  $notification
     * @return boolean
     */
    public function addNotification(Notification $notification);

    /**
     * Marks the notifications as read for the given target
     * @param NotificationTargetInterface $target
     */
    public function readNotifications(NotificationSubscriberInterface $subscriber, NotificationTargetInterface $target = null);
}