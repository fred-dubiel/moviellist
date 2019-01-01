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

        $requestsToBeDone =  ceil($quantity/self::MOVIES_PER_PAGE);

        $list = $this->handleRequests($requestsToBeDone,"movie", "upcoming");

        return array_slice($list, 0, $quantity);
    }

    public function findByTitle($query, $quantity = 20)
    {

        $connector = new TmdbApiConnector();
       
        $requestsToBeDone =  ceil($quantity/self::MOVIES_PER_PAGE);

        $list = $this->handleRequests($requestsToBeDone,"search", "movie", $query);

       return array_slice($list, 0, $quantity);
    }

    public function findById($id)
    {
        $connector = new TmdbApiConnector();

        $response = $connector->apiConnect("movie", $id);
        return MovieFactory::createMovie(
            json_decode($response->getBody())
            );
    }

    private function handleRequests($requestsToBeDone, $entity, $type, $query = null)
    {
         $list = [];

         $connector = new TmdbApiConnector();
         for ($page = 1;  $page <= $requestsToBeDone; $page++) {
            $response = $connector->apiConnect($entity, $type, $page, $query);
            $list = MovieFactory::createByJsonList(
                json_decode($response->getBody())->results
            );
        }

        return $list;
    }

}
