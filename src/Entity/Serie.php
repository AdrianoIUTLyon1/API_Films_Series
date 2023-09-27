<?php

namespace App\Entity;




class Serie
{

    private $id;

    private $nom;


    private $nbSaison;


    private $nbEpisode;

    private $nbNotes;


    private $langues;


    private $paysOrigine;


    private $image;


    private $realisateurs;


    private $dateParution;


    private $statut;


    private $isAdult;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNbSaison(): ?int
    {
        return $this->nbSaison;
    }

    public function setNbSaison(int $nbSaison): self
    {
        $this->nbSaison = $nbSaison;

        return $this;
    }

    public function getNbEpisode(): ?int
    {
        return $this->nbEpisode;
    }

    public function setNbEpisode(int $nbEpisode): self
    {
        $this->nbEpisode = $nbEpisode;

        return $this;
    }

    public function getNbNotes(): ?int
    {
        return $this->nbNotes;
    }

    public function setNbNotes(int $nbNotes): self
    {
        $this->nbNotes = $nbNotes;

        return $this;
    }

    public function getLangues(): ?string
    {
        return $this->langues;
    }

    public function setLangues(string $langues): self
    {
        $this->langues = $langues;

        return $this;
    }

    public function getPaysOrigine(): ?string
    {
        return $this->paysOrigine;
    }

    public function setPaysOrigine(string $paysOrigine): self
    {
        $this->paysOrigine = $paysOrigine;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getRealisateurs(): ?string
    {
        return $this->realisateurs;
    }

    public function setRealisateurs(string $realisateurs): self
    {
        $this->realisateurs = $realisateurs;

        return $this;
    }

    public function getDateParution(): ?\DateTimeInterface
    {
        return $this->dateParution;
    }

    public function setDateParution(\DateTimeInterface $dateParution): self
    {
        $this->dateParution = $dateParution;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getIsAdult(): ?bool
    {
        return $this->isAdult;
    }

    public function setIsAdult(bool $isAdult): self
    {
        $this->isAdult = $isAdult;

        return $this;
    }
}