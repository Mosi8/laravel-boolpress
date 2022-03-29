<?php

use App\Http\Controllers\Admin\PostController;
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

// Route::get('/', function () {
//     return view('front');
// });

Auth::routes();


Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function (){
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('/posts', 'PostController'); 
        Route::patch("comments/{comment}", "CommentController@update")->name("comments.update");
        Route::delete("comments/{comment}", "CommentController@destroy")->name("comments.destroy");
    });

Route::get("{any?}", function() {
    return view("front");
})->where("any", ".*");

