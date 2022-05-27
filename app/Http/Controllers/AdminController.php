<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // show users
public function users(){
    return view('users.index');
}


}
