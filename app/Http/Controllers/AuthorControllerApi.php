<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AuthorControllerApi extends Controller
{

    // fetch authors without key
    public function FetchAuthorsWithoutApiKey(){

        $client = new Client(); //GuzzleHttp\Client
        // $url = "https://api.github.com/users/kingsconsult/repos";
         $url = " http://localhost:8002/api/authors";
         

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());
        dd($responseBody);

        return view('authors.apiwithoutkey', compact('responseBody'));

    }

    // testing with key
    public function FetchAuthorsWithApiKey(){
        $client = new Client();
       // $url = "https://dev.to/api/articles/me/published";
       $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDIvYXBpL2xvZ2luIiwiaWF0IjoxNjUzNjU3NTc3LCJleHAiOjE2NTM2NjExNzcsIm5iZiI6MTY1MzY1NzU3NywianRpIjoiNUk4eFBLbmExR0pzRWZWYiIsInN1YiI6IjkiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.bUHHpUHL_mpeP6IfOy55RgxKOtCoHNPDyne-nIfVOXM';
       $response = $client->get('http://localhost:8002/api/authors', [
        'headers' => [
            'Authorization' => 'Bearer '.$token,
            'Accept' => 'application/json',
        ],
      ]);
      
      
        $responseBody = json_decode($response->getBody());
        dd($responseBody);

        return view('authors.apiwithkey', compact('responseBody'));

    }
    // end of testing with key






}
