<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Contact;
use App\Entity\Product;
use App\Entity\Subscription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Exception;

/**
 * @method Subscription|null find($id, $lockMode = null, $lockVersion = null)
 * @method Subscription|null findOneBy(array $criteria, array $orderBy = null)
 * @method Subscription[]    findAll()
 * @method Subscription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubscriptionRepository extends ServiceEntityRepository
{
    private const MINIMUM_ROWS_CHANGED = 1;

    /**
     * SubscriptionRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Subscription::class);
    }

    /**
     * @param $id
     * @return array|null
     */
    public function findOneById($id): ?array
    {
        return $this->createQueryBuilder('s')
            ->select('s')
            ->where('s.id = :id')
            ->setParameter('id', $id)
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();
    }

    /**
     * @param Subscription $subscription
     * @return int|bool
     * @throws Exception
     */
    public function updateSubscription($subscription): ?bool
    {
        $em = $this->getEntityManager();

        $updateContact = $em->getRepository(Contact::class)->updateContact($subscription->getContact());
        $updateProduct = $em->getRepository(Product::class)->updateProduct($subscription->getProduct());

        $beginDate = $subscription->getBeginDate()->format('Y-m-d h:m:s');
        $endDate = $subscription->getEndDate()->format('Y-m-d h:m:s');
        $updateSubscription = $this->createQueryBuilder('s')
            ->update()
            ->set('s.beginDate', ':beginDate')
            ->set('s.endDate', ':endDate')
            ->where('s.id = :id')
            ->setParameter('id', $subscription->getId())
            ->setParameter('beginDate', $beginDate)
            ->setParameter('endDate', $endDate)
            ->getQuery()
            ->execute();
        if (self::MINIMUM_ROWS_CHANGED <= ($updateContact + $updateProduct + $updateSubscription)) {
            return true;
        }
        return null;
    }

    /**
     * @param int $id
     * @return int
     */
    public function removeSubscription(int $id): int
    {
        return $this->createQueryBuilder('s')
            ->delete()
            ->where('s.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->execute();
    }
}
