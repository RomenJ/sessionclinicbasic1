<?php

namespace App\Entity;

use App\Repository\MedicoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MedicoRepository::class)]
class Medico
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $surname = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateborn = null;

    #[ORM\OneToMany(mappedBy: 'medico', targetEntity: Sessionvaloracion::class)]
    private Collection $sessionvaloracions;

    public function __construct()
    {
        $this->sessionvaloracions = new ArrayCollection();
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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getDateborn(): ?\DateTimeInterface
    {
        return $this->dateborn;
    }

    public function setDateborn(?\DateTimeInterface $dateborn): self
    {
        $this->dateborn = $dateborn;

        return $this;
    }

    /**
     * @return Collection<int, Sessionvaloracion>
     */
    public function getSessionvaloracions(): Collection
    {
        return $this->sessionvaloracions;
    }

    public function addSessionvaloracion(Sessionvaloracion $sessionvaloracion): self
    {
        if (!$this->sessionvaloracions->contains($sessionvaloracion)) {
            $this->sessionvaloracions->add($sessionvaloracion);
            $sessionvaloracion->setMedico($this);
        }

        return $this;
    }

    public function removeSessionvaloracion(Sessionvaloracion $sessionvaloracion): self
    {
        if ($this->sessionvaloracions->removeElement($sessionvaloracion)) {
            // set the owning side to null (unless already changed)
            if ($sessionvaloracion->getMedico() === $this) {
                $sessionvaloracion->setMedico(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name .','. $this->surname;
    
    }
}
