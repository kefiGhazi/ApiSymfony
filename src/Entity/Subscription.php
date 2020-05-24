<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\SubscriptionRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use JMS\Serializer\Annotation as Serializer;


/**
 * @ORM\Entity(repositoryClass=SubscriptionRepository::class)
 */
class Subscription implements SubscriptionInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="datetime")
     * @Serializer\Type("DateTime<'Y-m-d'>")
     */
    private DateTime $beginDate;

    /**
     * @ORM\Column(type="datetime")
     * @Serializer\Type("DateTime<'Y-m-d'>")
     */
    private DateTime $endDate;

    /**
     * @ORM\ManyToOne(targetEntity=Contact::class, cascade={"persist", "refresh"}, inversedBy="subscriptions")
     */
    private Contact $contact;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, cascade={"persist"}, inversedBy="subscriptions")
     */
    private Product $product;



    /**
     * @inheritDoc
     * @codeCoverageIgnore
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /** @inheritDoc */
    public function getBeginDate(): DateTime
    {
        return $this->beginDate;
    }

    /** @inheritDoc
     * @throws Exception
     */
    public function setBeginDate(string $beginDate): self
    {
        $this->beginDate = new DateTime($beginDate);

        return $this;
    }

    /** @inheritDoc */
    public function getEndDate(): DateTime
    {
        return $this->endDate;
    }

    /** @inheritDoc
     * @throws Exception
     */
    public function setEndDate(string $endDate): self
    {
        $this->endDate = new DateTime($endDate);

        return $this;
    }

    /** @inheritDoc */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /** @inheritDoc */
    public function setContact(?Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /** @inheritDoc */
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    /** @inheritDoc */
    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

}
