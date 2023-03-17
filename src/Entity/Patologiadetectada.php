<?php

namespace App\Entity;

use App\Repository\PatologiadetectadaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PatologiadetectadaRepository::class)]
class Patologiadetectada
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $deacription = null;

    #[ORM\OneToMany(mappedBy: 'patologia1', targetEntity: Sessionvaloracion::class)]
    private Collection $sessionvaloracion1;

    #[ORM\OneToMany(mappedBy: 'patologia2', targetEntity: Sessionvaloracion::class)]
    private Collection $sessionvaloracion2;

    #[ORM\OneToMany(mappedBy: 'patologia3', targetEntity: Sessionvaloracion::class)]
    private Collection $sessionvaloracion3;

    public function __construct()
    {
        $this->sessionvaloracion1 = new ArrayCollection();
        $this->sessionvaloracion2 = new ArrayCollection();
        $this->sessionvaloracion3 = new ArrayCollection();
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

    public function getDeacription(): ?string
    {
        return $this->deacription;
    }

    public function setDeacription(?string $deacription): self
    {
        $this->deacription = $deacription;

        return $this;
    }

    /**
     * @return Collection<int, Sessionvaloracion>
     */
    public function getSessionvaloracion1(): Collection
    {
        return $this->sessionvaloracion1;
    }

    public function addSessionvaloracion1(Sessionvaloracion $sessionvaloracion1): self
    {
        if (!$this->sessionvaloracion1->contains($sessionvaloracion1)) {
            $this->sessionvaloracion1->add($sessionvaloracion1);
            $sessionvaloracion1->setPatologia1($this);
        }

        return $this;
    }

    public function removeSessionvaloracion1(Sessionvaloracion $sessionvaloracion1): self
    {
        if ($this->sessionvaloracion1->removeElement($sessionvaloracion1)) {
            // set the owning side to null (unless already changed)
            if ($sessionvaloracion1->getPatologia1() === $this) {
                $sessionvaloracion1->setPatologia1(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Sessionvaloracion>
     */
    public function getSessionvaloracion2(): Collection
    {
        return $this->sessionvaloracion2;
    }

    public function addSessionvaloracion2(Sessionvaloracion $sessionvaloracion2): self
    {
        if (!$this->sessionvaloracion2->contains($sessionvaloracion2)) {
            $this->sessionvaloracion2->add($sessionvaloracion2);
            $sessionvaloracion2->setPatologia2($this);
        }

        return $this;
    }

    public function removeSessionvaloracion2(Sessionvaloracion $sessionvaloracion2): self
    {
        if ($this->sessionvaloracion2->removeElement($sessionvaloracion2)) {
            // set the owning side to null (unless already changed)
            if ($sessionvaloracion2->getPatologia2() === $this) {
                $sessionvaloracion2->setPatologia2(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Sessionvaloracion>
     */
    public function getSessionvaloracion3(): Collection
    {
        return $this->sessionvaloracion3;
    }

    public function addSessionvaloracion3(Sessionvaloracion $sessionvaloracion3): self
    {
        if (!$this->sessionvaloracion3->contains($sessionvaloracion3)) {
            $this->sessionvaloracion3->add($sessionvaloracion3);
            $sessionvaloracion3->setPatologia3($this);
        }

        return $this;
    }

    public function removeSessionvaloracion3(Sessionvaloracion $sessionvaloracion3): self
    {
        if ($this->sessionvaloracion3->removeElement($sessionvaloracion3)) {
            // set the owning side to null (unless already changed)
            if ($sessionvaloracion3->getPatologia3() === $this) {
                $sessionvaloracion3->setPatologia3(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name ;
    
    }
}
