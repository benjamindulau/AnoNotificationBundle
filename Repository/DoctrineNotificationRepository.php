<?php

namespace Ano\Bundle\NotificationBundle\Repository;

use Doctrine\ORM\EntityManager;
use Ano\Bundle\NotificationBundle\Model\Notification;

class DoctrineNotificationRepository implements NotificationRepositoryInterface
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(Notification $notification)
    {
        $this->entityManager->persist($notification);
        $this->entityManager->flush();
    }

    public function remove(Notification $notification)
    {
        // TODO: Implement remove() method.
    }


}