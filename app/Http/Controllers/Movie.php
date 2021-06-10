<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class Movie extends Controller
{
    public $client;

    public function __construct()
    {
        $this->client = new Client();
    }
    public function getMovie()
    {
        // $mov = $this->client->get('https://api.themoviedb.org/3/movie/popular?api_key=c73639395a74af48399e0e259896a9c3&language=en-US&page=1');
        // $response = $mov->getBody();
        $response = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=c73639395a74af48399e0e259896a9c3&language=en-US&page=1');
        $result = $response->collect();
        //dd($result['results']);
        // dd($response->collect());
        return view('welcome', ['movies' => $result['results']]);
    }
}
