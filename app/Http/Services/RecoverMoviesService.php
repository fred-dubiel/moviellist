<?php

namespace App\Http\Services;

use App\Http\Factories\MovieFactory;
use App\Http\Connectors\TmdbApiConnector;

class RecoverMoviesService
{

	const MOVIES_PER_PAGE = 20;

    public function recoverUpcomingList($quantity)
    {

    	if ($quantity < 1) {
    		throw new Exception("Invalid Quantity", 1);    		
    	}

        $connector = new TmdbApiConnector();

        $list = [];

        $requestsToBeDone =  ceil($quantity/self::MOVIES_PER_PAGE);

        for ($page = 1;  $page <= $requestsToBeDone; $page++) {
     		$response = $connector->apiConnect("movie", "upcoming", $page);

			$list = array_merge( $list, MovieFactory::createByJsonList(
            	json_decode($response->getBody())
            	->results
            	));
		}
		
        return array_slice($list, 0, $quantity);
    }

    public function findByTitle($query, $page = 20)
    {

        $connector = new TmdbApiConnector();

        $list = [];
        $requestsToBeDone =  ceil($quantity/self::MOVIES_PER_PAGE);

        for ($page = 1;  $page <= $requestsToBeDone; $page++) {
            $response = $connector->apiConnect("search", "movie", $page, $query);
            $list = MovieFactory::createByJsonList(
            json_decode($response->getBody())
            ->results
            );
        }
       
        return $list;
    }

    public function findById($id)
    {
        $connector = new TmdbApiConnector();

        $response = $connector->apiConnect("movie", $id);
        return MovieFactory::createMovie(
            json_decode($response->getBody())
            );
    }
}
