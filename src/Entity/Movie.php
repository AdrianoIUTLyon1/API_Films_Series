<?php
namespace App\Data;
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;




class Movie
{

    private $id;


    private $title;


    private $imagePoster;

    private $imageBanner;


    private $video;


    private $synopsis;

    private $language;


    private $isAdult;

    private $releaseDate;


    private $rating;

    private $director;

    private Collection $actors;


    private Collection $themes;


    private Collection $reviews;



    public function __construct($movie)
    {
        $this->id = $movie["id"];
        $this->title = $movie["title"];
        $this->imagePoster = 'https://image.tmdb.org/t/p/original' . $movie["poster_path"];
        $this->imageBanner = 'https://image.tmdb.org/t/p/original' . $movie["backdrop_path"];
        $this->video = $movie["video"];
        $this->synopsis = $movie["overview"];
        $this->language = $movie["original_language"];
        $this->isAdult = $movie["adult"];
        $this->releaseDate = $movie["release_date"];
        $this->rating = $movie["vote_count"];
        $this->director = null;
        $this->actors = new ArrayCollection();
        $this->themes = new ArrayCollection();
        $this->reviews = new ArrayCollection();
    }



    public function getActors(): Collection
    {
        return $this->actors;
    }

    public function addActor(Actor $actor): self
    {
        if (!$this->actors->contains($actor)) {
            $this->actors[] = $actor;
        }

        return $this;
    }

    public function removeActor(Actor $actor): self
    {
        if ($this->actors->contains($actor)) {
            $this->actors->removeElement($actor);
        }

        return $this;
    }


    public function getThemes(): Collection
    {
        return $this->themes;
    }

    public function addTheme(Theme $theme): self
    {
        if (!$this->themes->contains($theme)) {
            $this->themes[] = $theme;
        }

        return $this;
    }

    public function removeTheme(Theme $theme): self
    {
        if ($this->themes->contains($theme)) {
            $this->themes->removeElement($theme);
        }

        return $this;
    }

    public function getReviews(): Collection
    {
        return $this->reviews;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getImageBanner(): ?string
    {
        return $this->imageBanner;
    }

    public function setImageBanner(string $imageBanner): self
    {
        $this->imagePoster = $imageBanner;

        return $this;
    }

    public function getImagePoster(): ?string
    {
        return $this->imagePoster;
    }

    public function setImagePoster(string $imagePoster): self
    {
        $this->imagePoster = $imagePoster;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(string $video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): self
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

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

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTimeInterface $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(float $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(string $director): self
    {
        $this->director = $director;

        return $this;
    }
}