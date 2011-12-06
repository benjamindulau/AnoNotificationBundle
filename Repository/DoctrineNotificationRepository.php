<?php

namespace Ano\Bundle\NotificationBundle\Repository;

use Doctrine\ORM\EntityManager;
use Ano\Bundle\NotificationBundle\Model\Notification;
use Ano\Bundle\NotificationBundle\Model\NotificationTargetInterface;
use Ano\Bundle\NotificationBundle\Model\NotificationSubscriberInterface;

class DoctrineNotificationRepository implements NotificationRepositoryInterface
{
    private $entityManager;
    private $class;

    public function __construct(EntityManager $entityManager, $class)
    {
        $this->entityManager = $entityManager;
        $this->class = $class;
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

    public function findUnreadForSubscriberAndTarget(NotificationSubscriberInterface $subscriber, NotificationTargetInterface $target)
    {
        $qb = $this->entityManager->createQueryBuilder();
        $qb
            ->select('n')
            ->from($this->class, 'n')
            ->where('n.recipient = :recipient')
            ->andWhere('n.target = :target')
            ->andWhere('n.readAt IS NULL')
            ->setParameters(array(
                'recipient' => $subscriber,
                'target' => $target,
            ));

        return $qb->getQuery()->getResult();
    }

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    private function getRepository()
    {
        return $this->entityManager->getRepository($this->class);
    }
}