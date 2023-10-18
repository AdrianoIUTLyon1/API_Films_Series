<?php

namespace App\Entity;

use App\Repository\FavoriteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FavoriteRepository::class)]
class Favorite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $idFavoriteMovie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getIdFavoriteMovie(): ?string
    {
        return $this->idFavoriteMovie;
    }

    public function setIdFavoriteMovie(?string $idFavoriteMovie): static
    {
        $this->idFavoriteMovie = $idFavoriteMovie;

        return $this;
    }
}
