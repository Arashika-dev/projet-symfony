<?php

namespace App\Entity;

use App\Repository\CategoryMotoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryMotoRepository::class)]
class CategoryMoto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: ModelMoto::class)]
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
            $modelMoto->setCategory($this);
        }

        return $this;
    }

    public function removeModelMoto(ModelMoto $modelMoto): static
    {
        if ($this->modelMotos->removeElement($modelMoto)) {
            // set the owning side to null (unless already changed)
            if ($modelMoto->getCategory() === $this) {
                $modelMoto->setCategory(null);
            }
        }

        return $this;
    }
}
