<?php

/**
 * This file is part of the AnoNotificationBundle
 *
 * (c) anonymation <contact@anonymation.com>
 *
 */

namespace Ano\Bundle\NotificationBundle\Model;

use DateTime;

abstract class Notification
{
    /* @var NotifiableInterface $target */
    protected $target;

    /* @var NotificationSubscriberInterface */ 
    protected $recipient;

    /* @var string */
    protected $message;

    /* @var \DateTime */
    protected $readAt;

    /* @var DateTime */
    protected $createdAt;


    public function __construct(
        NotifiableInterface $target = null,
        NotificationSubscriberInterface $recipient = null,
        $message = null)
    {
        $this->createdAt = new DateTime();
        $this->setTarget($target);
        $this->setRecipient($recipient);
        $this->setMessage($message);
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param \DateTime $readAt
     */
    public function setReadAt(DateTime $readAt)
    {
        $this->readAt = $readAt;
    }

    /**
     * @return \DateTime
     */
    public function getReadAt()
    {
        return $this->readAt;
    }

    /**
     * @param NotificationSubscriberInterface $recipient
     */
    public function setRecipient(NotificationSubscriberInterface $recipient)
    {
        $this->recipient = $recipient;
    }

    /**
     * @return NotificationSubscriberInterface
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * @param NotifiableInterface $target
     */
    public function setTarget(NotifiableInterface $target)
    {
        $this->target = $target;
    }

    /**
     * @return NotifiableInterface
     */
    public function getTarget()
    {
        return $this->target;
    }

    public function markRead()
    {
        $this->readAt = new DateTime();
    }

    public function markUnread()
    {
        $this->readAt = null;
    }

    /**
     * @return boolean
     */
    public function isRead()
    {
        return (null !== $this->readAt);
    }
}