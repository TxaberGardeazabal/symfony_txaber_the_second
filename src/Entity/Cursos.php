<?php

namespace App\Entity;

use App\Repository\CursosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CursosRepository::class)]
class Cursos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nombr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descripcion = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imagenurl = null;

    #[ORM\Column(length: 255)]
    private ?string $categoria = null;

    #[ORM\Column(length: 50)]
    private ?string $familia = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombr(): ?string
    {
        return $this->nombr;
    }

    public function setNombr(string $nombr): static
    {
        $this->nombr = $nombr;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getImagenurl(): ?string
    {
        return $this->imagenurl;
    }

    public function setImagenurl(?string $imagenurl): static
    {
        $this->imagenurl = $imagenurl;

        return $this;
    }

    public function getCategoria(): ?string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): static
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getFamilia(): ?string
    {
        return $this->familia;
    }

    public function setFamilia(string $familia): static
    {
        $this->familia = $familia;

        return $this;
    }
}
