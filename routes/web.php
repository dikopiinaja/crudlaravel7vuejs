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
    return view('app');
});


Route::get('/student/{any}', function () {
    return view('app');
})->where('any', '.*'); 

Route::get('/subject/{any}', function () {
    return view('app');
})->where('any', '.*'); 


// Route::get('/home', 'ScoreController@index');
// Route::resource('scores', 'ScoreController');
// Route::get('/scores', 'ScoreController@index');
// Route::post('/scores/store','ScoreController@store');
