<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorControllerApi extends Controller
{

    // fetch authors without key
    public function FetchAuthorsWithoutApiKey(){

        return "api without key";
    }

    // fetch authors with key
    public function FetchAuthorsWithApiKey(){
        return "api with key";

    }

}
