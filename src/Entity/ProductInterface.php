<?php
declare(strict_types=1);

namespace App\Entity;

/**
 * Interface ProductInterface
 * @package App\Entity
 */
interface ProductInterface
{
    /**
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * @return string|null
     */
    public function getLabel(): ?string;

    /**
     * @param string $label
     * @return $this
     */
    public function setLabel(string $label): self;
}