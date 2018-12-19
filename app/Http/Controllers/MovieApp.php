<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\RecoverMoviesService;

class MovieApp extends Controller
{

    public function index(Request $request)
    {

        try{
        $recoverMoviesService = new RecoverMoviesService();

        return view(
            'MovieApp.movieList',
            [
                'movies' => $recoverMoviesService->recoverUpcomingList(
                    $request->get("quantity")?:20
                    )
            ]
            );    
    } catch(\Exception $e) {

    }
    	
    }

    public function find(Request $request)
    {
        
    	$recoverMoviesService = new RecoverMoviesService();

        if ($request->get('q')) {
         return view(
            'MovieApp.movieList',
            ['movies' => $recoverMoviesService->findByTitle($request->get('q')) ]
            );   
        } 

        return view(
            'MovieApp.movieList',
            [
                'movies' => $recoverMoviesService->recoverUpcomingList(
                    $request->get("quantity")?:20
                    ) 
            ]
            );    
       	 
    }

    public function detail(Request $request)
    {

    	$recoverMoviesService = new RecoverMoviesService();
    	
       	 return view(
        	'MovieApp.movieDetail',
        	['movie' => $recoverMoviesService->findById($request->get('id')) ]
        	);
    }
}
