<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AuthorControllerApi extends Controller
{

    
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

        return view('authors.apiwithkey', compact('responseBody'));

    }






}
