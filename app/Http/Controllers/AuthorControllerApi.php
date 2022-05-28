<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AuthorControllerApi extends Controller
{

    // Get all authors method
    public function GetAllAuthors(){

       $client = new Client();
    //access token
       $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDIvYXBpL2xvZ2luIiwiaWF0IjoxNjUzNjc0NTE3LCJleHAiOjE2NTM2NzgxMTcsIm5iZiI6MTY1MzY3NDUxNywianRpIjoiVlFybThRUkJldUt2SGZKUyIsInN1YiI6IjkiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.OepiGFtX79L98epmOhZo7HY7ioRwHNas4Mdp-CHMcD0';
       $response = $client->get('http://localhost:8002/api/authors', [
        'headers' => [
            'Authorization' => 'Bearer '.$token,
            'Accept' => 'application/json',
        ],
       ]);
        // response
        $responseBody = json_decode($response->getBody());
        //redirect
        return view('authors.all_authors', compact('responseBody'));

    }

    // show form to capture data from form
    public function create(){
        return view('authors.add_author');
    }

    // save author to remote db:method
    public function store(Request $request){

        $client = new Client();
        $url = 'http://localhost:8002/api/authors';
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDIvYXBpL2xvZ2luIiwiaWF0IjoxNjUzNjgxNTExLCJleHAiOjE2NTM2ODUxMTEsIm5iZiI6MTY1MzY4MTUxMSwianRpIjoiR2JwUnBMMjJjc3VnUmNMdSIsInN1YiI6IjkiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.ZNuqzRwbtDkKwf9FUMTd__VSqeCWSmbTROAlGFATmf8';
        //'name' => 'wandie' //for static data //works
        $form_params = [
            'name'                        => $request->name,
            'email'                       => $request->email,
            'twitter'                     => $request->twitter,
            'github'                      => $request->github,
            'location'                    => $request->location,
            'latest_article_published'    => $request->latest_article_published,
        ];
        //response to post data
        $response = $client->post($url, ['form_params' => $form_params],[
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
            ],
           ]);
        // response
        $responseBody = json_decode($response->getBody()->getContents());
        return redirect('/authors/all_authors');
}


}
