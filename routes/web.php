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

Route::get('/','FrontendController@index')->name('index');
Route::get('/artist','FrontendController@artist')->name('artist');
Route::get('/album','FrontendController@album')->name('album');
Route::get('/song','FrontendController@song')->name('song');
Route::get('/category','FrontendController@category')->name('category');
Route::get('artistdetail/{id}','FrontendController@artistdetail')->name('artistdetail');
Route::get('categorydetail/{id}','FrontendController@categorydetail')->name('categorydetail');
Route::get('albumdetail/{id}','FrontendController@albumdetail')->name('albumdetail');
Route::get('playlist/{id}','FavoriteController@show')->name('playlist');
Route::post('/favorite','FavoriteController@favorite')->name('favorite');
Route::get('/content','FrontendController@content')->name('content');
Route::post('/feedback','FrontendController@feedback')->name('feedback');
Route::get('/about','FrontendController@about')->name('about');
Route::get('/allfavorite','FavoriteController@index')->name('allfavorite');




	//Backend

	Route::group(['middleware'=>'role:admin', 'prefix' => 'backside' , 'as' => 'backside.'], function(){


	Route::resource('/song','SongController');
	Route::resource('/album','AlbumController');

	Route::resource('/artist','ArtistController');
	Route::resource('/category','CategoryController');
	

		});
	Route::post('/albumartist','SongController@albumartist')->name('albumartist');

Auth::routes();

Route::get('/home', 'HomeController@index');

