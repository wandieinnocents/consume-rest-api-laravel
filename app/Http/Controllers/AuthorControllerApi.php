<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AuthorControllerApi extends Controller
{

    // Get all authors
    public function GetAllAuthors(){

       $client = new Client();
       $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDIvYXBpL2xvZ2luIiwiaWF0IjoxNjUzNjc0NTE3LCJleHAiOjE2NTM2NzgxMTcsIm5iZiI6MTY1MzY3NDUxNywianRpIjoiVlFybThRUkJldUt2SGZKUyIsInN1YiI6IjkiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.OepiGFtX79L98epmOhZo7HY7ioRwHNas4Mdp-CHMcD0';
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
        $url = 'http://localhost:8002/api/authors';
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDIvYXBpL2xvZ2luIiwiaWF0IjoxNjUzNjc2NjY5LCJleHAiOjE2NTM2ODAyNjksIm5iZiI6MTY1MzY3NjY2OSwianRpIjoib3k0eGpJejA4Sktxb0JOdiIsInN1YiI6IjkiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.Hj02hiuJrg5epvynpiz8SvRf388ZknWnKr7CSlvXwTA';
        //pick form parameters
        $form_params = [
            'name'                        => 'kapere',
            'email'                       => 'ldaadfkaperejohn.smith@gmail.com',
            'twitter'                     => '@innocentWandie',
            'github'                      => 'wandieinnocents',
            'location'                      => 'kampala',
            'latest_article_published'    => 'There is the latest',
            
        ];
        //response to post data
        $response = $client->post($url, ['form_params' => $form_params],[
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
            ],
           ]);
        
        
        $responseBody = json_decode($response->getBody()->getContents());

        dd($responseBody);
      
 
     }







}
