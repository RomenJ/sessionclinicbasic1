<?php

namespace App\Entity;

use App\Repository\SessionvaloracionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionvaloracionRepository::class)]
class Sessionvaloracion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fecha = null;

    #[ORM\ManyToOne(inversedBy: 'sessionvaloracions')]
    private ?Medico $medico = null;

    #[ORM\ManyToOne(inversedBy: 'sessionvaloracions')]
    private ?Paciente $paciente = null;

    #[ORM\ManyToOne(inversedBy: 'sessionvaloracion1')]
    private ?Patologiadetectada $patologia1 = null;

    #[ORM\ManyToOne(inversedBy: 'sessionvaloracion2')]
    private ?Patologiadetectada $patologia2 = null;

    #[ORM\ManyToOne(inversedBy: 'sessionvaloracion3')]
    private ?Patologiadetectada $patologia3 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getMedico(): ?Medico
    {
        return $this->medico;
    }

    public function setMedico(?Medico $medico): self
    {
        $this->medico = $medico;

        return $this;
    }

    public function getPaciente(): ?Paciente
    {
        return $this->paciente;
    }

    public function setPaciente(?Paciente $paciente): self
    {
        $this->paciente = $paciente;

        return $this;
    }

    public function getPatologia1(): ?Patologiadetectada
    {
        return $this->patologia1;
    }

    public function setPatologia1(?Patologiadetectada $patologia1): self
    {
        $this->patologia1 = $patologia1;

        return $this;
    }

    public function getPatologia2(): ?Patologiadetectada
    {
        return $this->patologia2;
    }

    public function setPatologia2(?Patologiadetectada $patologia2): self
    {
        $this->patologia2 = $patologia2;

        return $this;
    }

    public function getPatologia3(): ?Patologiadetectada
    {
        return $this->patologia3;
    }

    public function setPatologia3(?Patologiadetectada $patologia3): self
    {
        $this->patologia3 = $patologia3;

        return $this;
    }
}
