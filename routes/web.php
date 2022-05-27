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

Route::get('/users','App\Http\Controllers\AdminController@users');

Route::prefix('authors')->group(function () {
// consume api without key
Route::get('/apiwithoutkey','App\Http\Controllers\AuthorControllerApi@FetchAuthorsWithoutApiKey');
// consume api with key
Route::get('/apiwithkey','App\Http\Controllers\AuthorControllerApi@FetchAuthorsWithApiKey');


});


