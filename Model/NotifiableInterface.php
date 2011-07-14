<?php

namespace Ano\Bundle\NotificationBundle\Model;

interface NotifiableInterface
{
    /**
     * @return string
     */
    public function getNotifiableName();
}