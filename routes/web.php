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

//route for creating post
Route::get('/post/{id}', function ($id) {
    return view('post',compact('id'));
})->name('create.post');


//main page route
Route::get('/', 'WebsiteController@websitesList')->name('website.list');

//request to post for data
Route::post('/post', 'PostController@post')->name('post');

//route for subscribers
Route::post('/subscribe', 'SubscriberController@subscribe')->name('create.subscriber');


Route::post('/Website', 'PostController@createWebsite')->name('create.website');







//for testing purposes

// Route::get('/subscribemail', 'SubscriberController@basic_email')->name('mail.subscriber');
// Route::get('email-test', function(){

// 	$details = 'baidar.sabaoon@gmail.com';

//     dispatch(new App\Jobs\SendEmailJob($details));

//     dd('done');
// });
