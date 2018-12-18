<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    private $id;

	/**
	 * @var String
	 */
	private $name;

	private $poster;

	private $backdrop;

	private $genre;

	private $releaseDate;


    
    public function setId($id)
    {
        $this->id = $id;        
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
		$this->name = $name;    	
    }

    public function getName()
    {
		return $this->name;
    }

    
    public function setPoster($poster)
    {
		$this->poster = $poster;    	
    }

    public function getPoster()
    {
		return $this->poster;
    }
        
    public function setBackdrop($backdrop)
    {
		$this->backdrop = $backdrop;    	
    }

    public function getBackdrop()
    {
		return $this->backdrop;
    }


    public function setGenre($genre)
    {
		$this->genre = $genre;    	
    }

    public function getGenre()
    {
		return $this->genre;
    }

    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = new \DateTime($releaseDate);
    }

    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    public function getFormatedReleaseDate($format)
    {
        return $this->getReleaseDate()->format($format);
    }

    
}
