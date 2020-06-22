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

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');



//cards
Route::get('/create_card', 'CardController@create')->name('create_card');
Route::get('/see_cards', 'CardController@index')->name('see_cards');
Route::post('submit_create_card', 'CardController@save');
Route::get('/try', 'CardController@try')->name('try');
Route::get('/my_cards', 'CardController@my_cards')->name('my_cards');


//trades
Route::get('post_card/{card_id}', 'TradeController@post_card')->name('post_card');

//admin
Route::get('/admin', 'AdminController@home')->name('admin');



