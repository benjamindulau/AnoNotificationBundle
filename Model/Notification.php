<?php

/**
 * This file is part of the AnoNotificationBundle
 *
 * (c) anonymation <contact@anonymation.com>
 *
 */

namespace Ano\Bundle\NotificationBundle\Model;

use Ano\Bundle\NotificationBundle\Model\NotificationTargetInterface;
use Ano\Bundle\NotificationBundle\Model\NotificationSubscriberInterface;
use Ano\Bundle\NotificationBundle\Model\Notification;
use DateTime;

abstract class Notification
{
    /* @var NotificationTargetInterface */
    protected $target;

    /* @var NotificationSubscriberInterface */
    protected $recipient;

    /* @var NotificationSubscriberInterface */
    protected $notifier;

    /* @var string */
    protected $message;

    /* @var string */
    protected $threadId;

    /* @var \DateTime */
    protected $readAt;

    /* @var DateTime */
    protected $createdAt;


    public function __construct(
        NotificationSubscriberInterface $notifier = null,
        NotificationSubscriberInterface $recipient = null,
        $threadId = null,
        $message = null)
    {
        $this->createdAt = new DateTime();
        $this->setNotifier($notifier);
        $this->setRecipient($recipient);
        $this->setThreadId($threadId);
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

    /**
     * @param NotificationSubscriberInterface $notifier
     */
    public function setNotifier(NotificationSubscriberInterface $notifier)
    {
        $this->notifier = $notifier;
    }

    /**
     * @return NotificationSubscriberInterface
     */
    public function getNotifier()
    {
        return $this->notifier;
    }

    /**
     * @param string $threadId
     */
    public function setThreadId($threadId)
    {
        $this->threadId = $threadId;
    }

    /**
     * @return string
     */
    public function getThreadId()
    {
        return $this->threadId;
    }

    /**
     * @param NotificationTargetInterface $target
     */
    public function setTarget(NotificationTargetInterface $target)
    {
        $this->target = $target;
    }

    /**
     * @return NotificationTargetInterface
     */
    public function getTarget()
    {
        return $this->target;
    }
}