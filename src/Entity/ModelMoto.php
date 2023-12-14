<?php

namespace App\Entity;

use App\Repository\ModelMotoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModelMotoRepository::class)]
class ModelMoto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $year = null;

    #[ORM\ManyToOne(inversedBy: 'modelMotos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CategoryMoto $category = null;

    #[ORM\ManyToOne(inversedBy: 'modelMotos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Brand $brand = null;

    #[ORM\OneToMany(mappedBy: 'moto', targetEntity: Advertisement::class, cascade:['remove'])]
    private Collection $advertisements;

    #[ORM\Column]
    private ?int $Engine = null;

    public function __construct()
    {
        $this->advertisements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getCategory(): ?CategoryMoto
    {
        return $this->category;
    }

    public function setCategory(?CategoryMoto $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return Collection<int, Advertisement>
     */
    public function getAdvertisements(): Collection
    {
        return $this->advertisements;
    }

    public function addAdvertisement(Advertisement $advertisement): static
    {
        if (!$this->advertisements->contains($advertisement)) {
            $this->advertisements->add($advertisement);
            $advertisement->setMoto($this);
        }

        return $this;
    }

    public function removeAdvertisement(Advertisement $advertisement): static
    {
        if ($this->advertisements->removeElement($advertisement)) {
            // set the owning side to null (unless already changed)
            if ($advertisement->getMoto() === $this) {
                $advertisement->setMoto(null);
            }
        }

        return $this;
    }

    public function getEngine(): ?int
    {
        return $this->Engine;
    }

    public function setEngine(int $Engine): static
    {
        $this->Engine = $Engine;

        return $this;
    }

    public function __toString()
    {
      return $this->name;
    }
}
