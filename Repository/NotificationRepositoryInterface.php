<?php

namespace Ano\Bundle\NotificationBundle\Repository;

use Ano\Bundle\NotificationBundle\Model\Notification;

interface NotificationRepositoryInterface
{
    public function save(Notification $notification);

    public function remove(Notification $notification);
}