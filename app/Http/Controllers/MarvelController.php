<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class MarvelController extends Controller
{
    //
 public  $marvel_url = 'http://gateway.marvel.com/v1/public/characters';

 public function index(Request $request){
    //store keys in env file for security
     $apiKey = env('API_KEY');
     $mPrivateKey = env('MARVEL_PRIVATE');
     $timestamp = time();
     $hash = md5($timestamp . $mPrivateKey . $apiKey);

     //Key Parameters + the url to fetch marvel charces
     $fetchUrl = $this->marvel_url . "?ts=$timestamp&apikey=$apiKey&hash=$hash";


    //get the provided link
    $marveldata = HTTP::get($fetchUrl);
 
    
    //Return collection of the json data
     $result = collect($marveldata->json()['data']['results'])->transform(function ($character) {
        return collect($character)->only(['id', 'name', 'description', 'thumbnail', 'urls']);
    })->transform(function ($value) {
        $value['thumbnail'] = $value['thumbnail']['path'] . '/portrait_incredible.' .  $value['thumbnail']['extension'];
        return $value;
    });
    // dd($result);

    return view('index',['marvel_characters' => $result,]);
}
        
 }



