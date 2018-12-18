<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TmdbApiConnector extends ServiceProvider
{
    const API_KEY = '1f54bd990f1cdfb230adb312546d765d';
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function apiConnect($type)
    {
        $client = new Client();
        echo sprintf('https://api.themoviedb.org/3/movie/%s?api_key=%s&language=%s&page=%i',
                $type,
                self::API_KEY,
                'en-US'
                1
                ).
        die;
        return $client->request(
            'GET',
            sprintf('https://api.themoviedb.org/3/movie/%s?api_key=%s&language=%s&page=%i',
                $type,
                self::API_KEY,
                'en-US'
                1
                )
            );
    }

}
