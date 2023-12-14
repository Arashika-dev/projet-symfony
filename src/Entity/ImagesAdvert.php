<?php

namespace App\Entity;

use App\Repository\ImagesAdvertRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImagesAdvertRepository::class)]
class ImagesAdvert
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'images')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Advertisement $advertisement = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $path = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdvertisement(): ?Advertisement
    {
        return $this->advertisement;
    }

    public function setAdvertisement(?Advertisement $advertisement): static
    {
        $this->advertisement = $advertisement;

        return $this;
    }

    public function getPath(): array
    {
        return $this->path;
    }

    public function setPath(string $path): static
    {
        $this->path = [$path];

        return $this;
    }
}
