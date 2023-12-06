<?php

namespace App\Entity;

use App\Repository\BrandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BrandRepository::class)]
class Brand
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'brand', targetEntity: ModelMoto::class)]
    private Collection $modelMotos;

    public function __construct()
    {
        $this->modelMotos = new ArrayCollection();
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

    /**
     * @return Collection<int, ModelMoto>
     */
    public function getModelMotos(): Collection
    {
        return $this->modelMotos;
    }

    public function addModelMoto(ModelMoto $modelMoto): static
    {
        if (!$this->modelMotos->contains($modelMoto)) {
            $this->modelMotos->add($modelMoto);
            $modelMoto->setBrand($this);
        }

        return $this;
    }

    public function removeModelMoto(ModelMoto $modelMoto): static
    {
        if ($this->modelMotos->removeElement($modelMoto)) {
            // set the owning side to null (unless already changed)
            if ($modelMoto->getBrand() === $this) {
                $modelMoto->setBrand(null);
            }
        }

        return $this;
    }
    
    public function __toString()
    {
      return $this->name;
    }
}
