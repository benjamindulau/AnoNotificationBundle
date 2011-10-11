<?php

namespace Ano\Bundle\NotificationBundle\Model;

interface NotificationTargetInterface
{
    /**
     * @return void
     */
    public function getNotificationTargetName();

    /**
     * @return integer
     */
    public function getUnreadNotificationCount();

    /**
     * @return integer
     */
    public function setUnreadNotificationCount();
}