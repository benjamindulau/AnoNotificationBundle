<?php

/**
 * This file is part of the AnoNotificationBundle
 *
 * (c) anonymation <contact@anonymation.com>
 *
 */

namespace Ano\Bundle\NotificationBundle\Model\Manager;

use Ano\Bundle\NotificationBundle\Model\Notification;

/**
 * Notification Manager.
 *
 * @author Benjamin Dulau <benjamin.dulau@anonymation.com>
 */
interface NotificationManagerInterface
{
    /**
     * Factory to create Notification instance
     *
     * @return Notification
     */
    public function createNotificationInstance();

    /**
     * Creates a new notification
     *
     * @param  Notification  $notification
     * @return boolean
     */
    public function createNotification(Notification $notification);
}