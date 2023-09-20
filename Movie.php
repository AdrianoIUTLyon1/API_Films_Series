<?php
namespace App\Data;

use App\Entity\Category;

class Movie
{
    public string $id ;
    public string $title = null;
    public string $picture = null;
    public string $video =null;
    public string $synopsis = null;
    public string $language = null;

    public bool $adult = 0;

    public int $mark = null;

    public string $director = null;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id=$id;
        return $this;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title=$title;
        return $this;
    }

    public function getVideo(){
        return $this->video;
    }

    public function setVideo($video){
        $this->video=$video;
        return $this;
    }

    public function getSynopsis(){
        return $this->synopsis;
    }

    public function set($synopsis){
        $this->synopsis=$synopsis;
        return $this;
    }

    public function get(){
        return $this->language;
    }

    public function set($language){
        $this->language=$language;
        return $this;
    }
    public function getAdult(){
        return $this->adult;
    }

    public function set($adult){
        $this->adult=$adult;
        return $this;
    }
    public function get(){
        return $this->;
    }

    public function set($){
        $this->=$;
        return $this;
    }
    public function get(){
        return $this->;
    }

    public function set($){
        $this->=$;
        return $this;
    }
    public function get(){
        return $this->;
    }

    public function set($){
        $this->=$;
        return $this;
    }
}

