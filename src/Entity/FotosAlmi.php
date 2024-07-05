<?php

namespace App\Entity;

use App\Repository\FotosAlmiRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FotosAlmiRepository::class)]
class FotosAlmi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $titulo = null;

    #[ORM\Column(length: 255)]
    private ?string $uri = null;

    #[ORM\Column]
    private ?int $exteriorFlag = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): static
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getUri(): ?string
    {
        return $this->uri;
    }

    public function setUri(string $uri): static
    {
        $this->uri = $uri;

        return $this;
    }

    public function getExteriorFlag(): ?int
    {
        return $this->exteriorFlag;
    }

    public function setExteriorFlag(int $exteriorFlag): static
    {
        $this->exteriorFlag = $exteriorFlag;

        return $this;
    }
}
