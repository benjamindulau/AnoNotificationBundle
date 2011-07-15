<?php

/**
 * This file is part of the AnoNotificationBundle
 *
 * (c) anonymation <contact@anonymation.com>
 *
 */

namespace Ano\Bundle\NotificationBundle\Mailer;

use Ano\Bundle\NotificationBundle\Model\Notification;
use Ano\Bundle\NotificationBundle\Model\NotificationSubscriberInterface;

/**
 * Mailer for notifications
 *
 * @author Benjamin Dulau <benjamin.dulau@anonymation.com>
 */
interface MailerInterface
{
    public function sendEmailForNotification(Notification $notification, NotificationSubscriberInterface $subscriber);
}