<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact implements ContactInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $firstName;

    /**
     * @inheritDoc
     * @codeCoverageIgnore
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /** @inheritDoc */
    public function getName(): ?string
    {
        return $this->name;
    }

    /** @inheritDoc */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /** @inheritDoc */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /** @inheritDoc */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }
}
