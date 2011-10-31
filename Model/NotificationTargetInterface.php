<?php

namespace Ano\Bundle\NotificationBundle\Model;

interface NotificationTargetInterface
{
    /**
     * @return string
     */
    public function getNotificationTargetName();

    /**
     * @return integer
     */
    public function getUnreadNotificationCount();

    /**
     * @param integer $count
     */
    public function setUnreadNotificationCount($count);
}