<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;
use App\Movie;
use App\Http\Factories\MovieFactory;

class RecoverMoviesService extends ServiceProvider
{
  

    public function recoverUpcomingList()
    {
        $connector = new TmdbApiConnector();

        return $connector->apiConnect("upcoming");
    }

        public function findByTitle()
    {
        $connector = new TmdbApiConnector();

        $connector->apiConnect("search", "movie");
    }
}
