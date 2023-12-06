<?php

namespace App\Entity;

use App\Repository\AdvertisementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdvertisementRepository::class)]
class Advertisement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $creadtedAt = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'advertisements', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'advertisements', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?ModelMoto $moto = null;

    #[ORM\OneToMany(mappedBy: 'advertisement', targetEntity: ImagesAdvert::class, orphanRemoval: true)]
    private Collection $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getCreadtedAt(): ?\DateTimeInterface
    {
        return $this->creadtedAt;
    }

    public function setCreadtedAt(\DateTimeInterface $creadtedAt): static
    {
        $this->creadtedAt = $creadtedAt;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getMoto(): ?ModelMoto
    {
        return $this->moto;
    }

    public function setMoto(?ModelMoto $moto): static
    {
        $this->moto = $moto;

        return $this;
    }

    /**
     * @return Collection<int, ImagesAdvert>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(ImagesAdvert $image): static
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setAdvertisement($this);
        }

        return $this;
    }

    public function removeImage(ImagesAdvert $image): static
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getAdvertisement() === $this) {
                $image->setAdvertisement(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }

}
