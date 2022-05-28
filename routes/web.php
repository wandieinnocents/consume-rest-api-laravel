<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Authors //Consuming api routes
Route::prefix('authors')->group(function () {
// show all authors
Route::get('/all_authors','App\Http\Controllers\AuthorControllerApi@GetAllAuthors');
// get form to add author
Route::get('/create','App\Http\Controllers\AuthorControllerApi@create');
// store author to remote microservice 
Route::post('/add_author','App\Http\Controllers\AuthorControllerApi@store');

});



