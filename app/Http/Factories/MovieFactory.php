<?php

namespace App\Http\Factories;

use App\Movie;

class MovieFactory
{

	public static function createByJsonList($json)
	{
		$arrayList = [];

		foreach ($json as $register) {
			$arrayList[] = self::createMovie($register);
		}
		
		return $arrayList;
		
	}

	public static function createMovie($movie)
	{
		$newMovie = new Movie();

		$newMovie->setId($movie->id);
		$newMovie->setName($movie->title);
		$newMovie->setPoster("https://image.tmdb.org/t/p/w500" . $movie->poster_path);
		$newMovie->setBackdrop("https://image.tmdb.org/t/p/w500" . $movie->backdrop_path);
		$newMovie->setReleaseDate($movie->release_date);

		$genres = [];
		if (isset($movie->genres)) {
			foreach ($movie->genres as $genre) {
				$genres[] = $genre->name;
			}	
		}		

		$newMovie->setGenre(implode(", ", $genres));

		return $newMovie;
	}
}
