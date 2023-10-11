<?php

namespace App\Entity;



class Review
{
    
    private $id;

    
    private $rating;

    
    private $comment;

    
    private $username;



    
    public function __construct($review)
    {
        $this->id = $review["id"];
        $this->rating = $review["author_details"]["rating"];
        $this->comment = $review["content"];
        $this->username = $review["author_details"]["username"];
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }
}
