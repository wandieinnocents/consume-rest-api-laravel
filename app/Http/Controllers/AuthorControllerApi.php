<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorControllerApi extends Controller
{

    // fetch authors without key
    public function FetchAuthorsWithoutApiKey(){

        return view('authors.apiwithoutkey');
    }

    // fetch authors with key
    public function FetchAuthorsWithApiKey(){
        return view('authors.apiwithkey');

    }

}
