<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AuthorControllerApi extends Controller
{

    // fetch authors without key
    public function FetchAuthorsWithoutApiKey(){

        $client = new Client(); //GuzzleHttp\Client
        $url = "https://api.github.com/users/kingsconsult/repos";


        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return view('authors.apiwithoutkey', compact('responseBody'));

    }

    // fetch authors with key
    public function FetchAuthorsWithApiKey(){
        $client = new Client();
        $url = "https://dev.to/api/articles/me/published";

        $params = [
            //If you have any Params Pass here
        ];

        $headers = [
            'api-key' => 'k3Hy5qr73QhXrmHLXhpEh6CQ'
        ];

        $response = $client->request('GET', $url, [
            // 'json' => $params,
            'headers' => $headers,
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return view('authors.apiwithkey', compact('responseBody'));

    }

}
