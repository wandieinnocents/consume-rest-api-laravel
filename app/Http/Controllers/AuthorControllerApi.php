<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AuthorControllerApi extends Controller
{

    // Get all authors
    public function GetAllAuthors(){

       $client = new Client();
       $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDIvYXBpL2xvZ2luIiwiaWF0IjoxNjUzNjY5Mzc2LCJleHAiOjE2NTM2NzI5NzYsIm5iZiI6MTY1MzY2OTM3NiwianRpIjoiSE81ZU9HRE9MV2IxS0tzVyIsInN1YiI6IjkiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.oROvep4R_C32AJo8b9DOc0mijnnGK564zxhvgngNHX4';
       $response = $client->get('http://localhost:8002/api/authors', [
        'headers' => [
            'Authorization' => 'Bearer '.$token,
            'Accept' => 'application/json',
        ],
       ]);

        $responseBody = json_decode($response->getBody());
        // dd($responseBody);

        return view('authors.all_authors', compact('responseBody'));

    }

    // Add author
    public function AddAuthor(){

        $client = new Client();
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDIvYXBpL2xvZ2luIiwiaWF0IjoxNjUzNjczMDk5LCJleHAiOjE2NTM2NzY2OTksIm5iZiI6MTY1MzY3MzA5OSwianRpIjoiUnlCMGhnaGNkSk9SbGRzQSIsInN1YiI6IjkiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.Hzvi7d1Fvab_vp38QnfMQxwouovEuLjHrsU7VKRBx3o';
        $response = $client->get('http://localhost:8002/api/authors', [
         'headers' => [
             'Authorization' => 'Bearer '.$token,
             'Accept' => 'application/json',
         ],
        ]);
 
         $responseBody = json_decode($response->getBody());
         // dd($responseBody);
 
         return view('authors.add_author', compact('responseBody'));
 
     }







}
