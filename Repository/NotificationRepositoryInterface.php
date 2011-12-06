<?php

namespace Ano\Bundle\NotificationBundle\Repository;

use Ano\Bundle\NotificationBundle\Model\Notification;
use Ano\Bundle\NotificationBundle\Model\NotificationTargetInterface;
use Ano\Bundle\NotificationBundle\Model\NotificationSubscriberInterface;

interface NotificationRepositoryInterface
{
    /**
     * @param Notification $notification
     * @return void
     */
    public function save(Notification $notification);

    /**
     * @param Notification $notification
     * @return void
     */
    public function remove(Notification $notification);

    /**
     * @param Notification $notification
     * @return Notification[]
     */
    public function findUnreadForSubscriberAndTarget(NotificationSubscriberInterface $subscriber, NotificationTargetInterface $target);
}