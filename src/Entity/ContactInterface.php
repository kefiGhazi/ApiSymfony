<?php
declare(strict_types=1);

namespace App\Entity;

/**
 * Interface ContactInterface
 * @package App\Entity
 */
interface ContactInterface
{
    /**
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self;

    /**
     * @return string|null
     */
    public function getFirstName(): ?string;

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName(string $firstName): self;
}