<?php

namespace Ano\Bundle\NotificationBundle\Model;

interface NotificationSubjectInterface
{
    /**
     * @return void
     */
    public function getNotificationSubjectName();

    /**
     * @return integer
     */
    public function getUnreadNotificationCount();

    /**
     * @return integer
     */
    public function setUnreadNotificationCount();
}