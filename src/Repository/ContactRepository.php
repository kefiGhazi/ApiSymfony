<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Contact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Contact|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contact|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contact[]    findAll()
 * @method Contact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
final class ContactRepository extends ServiceEntityRepository
{
    /**
     * ContactRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contact::class);
    }

    /**
     * @param Contact $contact
     * @return int|null
     */
    public function updateContact(Contact $contact): ?int
    {
        return $this->createQueryBuilder('c')
            ->update()
            ->set('c.name', ':name')
            ->set('c.firstName', ':firstName')
            ->where('c.id = :id')
            ->setParameter('id', $contact->getId())
            ->setParameter('name', $contact->getName())
            ->setParameter('firstName', $contact->getFirstName())
            ->getQuery()
            ->execute();
    }
}
