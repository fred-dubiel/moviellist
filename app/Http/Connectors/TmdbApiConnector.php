<?php

namespace App\Http\Connectors;

use GuzzleHttp\Client;

class TmdbApiConnector
{

    const API_KEY = '1f54bd990f1cdfb230adb312546d765d';

    /**
    *
    * @param $entity
    * @param $type
    * @param $page
    * @param $query
    */
    public function apiConnect($entity, $type, $page=1, $query =null)
    {

        $client = new Client();
        $response = $client->request(
            'GET',
            $this->createUri($entity, $type, $page, $query)
            );

        if ($response->getStatusCode() === 200) {
            return $response;
        }

        throw new Exception("Error Processing Request", 1);
    }

    private function createUri($entity, $type, $page =1, $query = null)
    {
        $uri = 'https://api.themoviedb.org/3/%s/%s?api_key=%s&language=%s&page=%s';
        $uri .= (!is_null($query)) ? '&query='.$query : '';

        return sprintf(
                $uri,
                $entity,
                $type,
                self::API_KEY,
                'en-US',
                $page
                );
    }

}
