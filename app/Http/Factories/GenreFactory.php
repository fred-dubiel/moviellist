<?php

namespace App\Http\Factories;

use App\Genre;

class GenreFactory
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
		$newGenre = new Genre();

		$newGenre->setName($movie->title);
		
		return $newGenre;
	}
}
