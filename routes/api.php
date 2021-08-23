<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
	
Route::post('register', 'UserController@register');
Route::post('auth', 'UserController@auth');
Route::get('profile', 'ProfileController@profile');

Route::get('profile-owner', 'ProfileController@profileAuth')->middleware('jwt.verify');
Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//         return $request->user();
//     });

// Student Api Route
Route::get('/student', 'StudentController@index');
Route::post('/student/store', 'StudentController@store');
Route::get('/student/edit/{id}', 'StudentController@getStudent');
Route::get('/student/show/{id}', 'StudentController@getStudent');
Route::put('/student/update/{id}', 'StudentController@update');
Route::delete('/student/{id}', 'StudentController@destroy');

// Subject Api Route
Route::get('/subject', 'SubjectController@index');
Route::post('/subject/store', 'SubjectController@store');
Route::get('/subject/edit/{id}', 'SubjectController@getSubject');
Route::get('/subject/show/{id}', 'SubjectController@getSubject');
Route::put('/subject/update/{id}', 'SubjectController@update');
Route::delete('/subject/{id}', 'SubjectController@destroy');

Route::post('tambahsubject', 'SubjectController@store');
    
Route::post('tambahscore', 'ScoreController@storeapi');
