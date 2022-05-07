<?php

namespace App\Entity;

use App\Repository\SectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionRepository::class)]
class Section
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $designation;

    #[ORM\OneToMany(mappedBy: 'section', targetEntity: Etudiant::class, orphanRemoval: true)]
    private $belongs;

    public function __construct()
    {
        $this->belongs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * @return Collection<int, Etudiant>
     */
    public function getBelongs(): Collection
    {
        return $this->belongs;
    }

    public function addBelong(Etudiant $belong): self
    {
        if (!$this->belongs->contains($belong)) {
            $this->belongs[] = $belong;
            $belong->setSection($this);
        }

        return $this;
    }

    public function removeBelong(Etudiant $belong): self
    {
        if ($this->belongs->removeElement($belong)) {
            // set the owning side to null (unless already changed)
            if ($belong->getSection() === $this) {
                $belong->setSection(null);
            }
        }

        return $this;
    }
}
