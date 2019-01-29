<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrainingRepository")
 */
class Training
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Module", mappedBy="trainings", cascade={"persist","remove"})
     */
    private $modules;


    public function __construct()
    {
      $this->modules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    

    /**
     * @return Collection|Module[]
     */
    public function getModules(): Collection
    {
        return $this->modules;
    }

    public function addModules(Module $modules): self
    {
        if (!$this->modules->contains($modules)) {
            $this->modules[] = $modules;
            $modules->addTraining($this);
        }

        return $this;
    }

    public function removeModules(Module $modules): self
    {
        if ($this->modules->contains($modules)) {
            $this->modules->removeElement($modules);
            $modules->removeTraining($this);
        }

        return $this;
    }
}
