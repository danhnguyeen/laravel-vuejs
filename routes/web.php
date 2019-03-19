<?php

use App\Post;
use App\User;
use App\Exceptions\HackerException;
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
// Test 
Route::get('/about', function () {
  return view('about');
});
Route::get('/posts', 'PostController@index');
Route::get('/create-post', 'PostController@create');
Route::get('/post/{id}', 'PostController@details');
Route::post('/posts', 'PostController@store')->name('post.create');
// Exception
// Route::get('/', function () {
//     throw new HackerException('afe');
// });
// Service Provider
// Route::get('/', function () {
//     dd(resolve('medium-php-sdk'));
// });
// Route::get('/', function () {
//   // $test = Post::find(2)->user()->delete();
//   // $test = Post::findOrFail(4);
//   return Response::json($test);
//   return view('welcome');
// });
// Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
