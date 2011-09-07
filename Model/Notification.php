<?php

/**
 * This file is part of the AnoNotificationBundle
 *
 * (c) anonymation <contact@anonymation.com>
 *
 */

namespace Ano\Bundle\NotificationBundle\Model;

use Ano\Bundle\NotificationBundle\Model\NotificationSubjectInterface;
use Ano\Bundle\NotificationBundle\Model\NotificationSubscriberInterface;
use Ano\Bundle\NotificationBundle\Model\Notification;
use DateTime;

abstract class Notification
{
    /* @var NotificationSubjectInterface $target */
    protected $subject;

    /* @var NotificationSubscriberInterface */ 
    protected $recipient;

    /* @var NotificationSubscriberInterface */
    protected $notifier;

    /* @var string */
    protected $message;

    /* @var \DateTime */
    protected $readAt;

    /* @var DateTime */
    protected $createdAt;


    public function __construct(
        NotificationSubscriberInterface $notifier = null,
        NotificationSubscriberInterface $recipient = null,
        NotificationSubjectInterface $subject = null,
        $message = null)
    {
        $this->createdAt = new DateTime();
        $this->setNotifier($notifier);
        $this->setRecipient($recipient);
        $this->setSubject($subject);
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
     * @param \Ano\Bundle\NotificationBundle\Model\NotificationSubscriberInterface $notifier
     */
    public function setNotifier(NotificationSubjectInterface $notifier)
    {
        $this->notifier = $notifier;
    }

    /**
     * @return \Ano\Bundle\NotificationBundle\Model\NotificationSubscriberInterface
     */
    public function getNotifier()
    {
        return $this->notifier;
    }

    /**
     * @param \Ano\Bundle\NotificationBundle\Model\NotificationSubjectInterface $subject
     */
    public function setSubject(NotificationSubjectInterface $subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return \Ano\Bundle\NotificationBundle\Model\NotificationSubjectInterface
     */
    public function getSubject()
    {
        return $this->subject;
    }
}