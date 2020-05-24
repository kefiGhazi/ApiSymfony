<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product implements ProductInterface
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
    private string $label;

    /**
     * @inheritDoc
     * @codeCoverageIgnore
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /** @inheritDoc */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /** @inheritDoc */
    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }
}
