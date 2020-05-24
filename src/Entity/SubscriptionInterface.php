<?php
declare(strict_types=1);

namespace App\Entity;

use DateTime;

/**
 * Interface SubscriptionInterface
 * @package App\Entity
 */
interface SubscriptionInterface
{
    /**
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * @return DateTime|null
     */
    public function getBeginDate(): ?DateTime;

    /**
     * @param string $beginDate
     * @return $this
     */
    public function setBeginDate(string $beginDate): self;

    /**
     * @return DateTime|null
     */
    public function getEndDate(): ?DateTime;

    /**
     * @param string $endDate
     * @return $this
     */
    public function setEndDate(string $endDate): self;

    /**
     * @return Contact|null
     */
    public function getContact(): ?Contact;

    /**
     * @param Contact|null $contact
     * @return $this
     */
    public function setContact(?Contact $contact): self;

    /**
     * @return Product|null
     */
    public function getProduct(): ?Product;

    /**
     * @param Product|null $product
     * @return $this
     */
    public function setProduct(?Product $product): self;
}