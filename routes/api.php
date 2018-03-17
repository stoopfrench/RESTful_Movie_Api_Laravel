<?php

use Illuminate\Http\Request;

// Titles Routes
Route::get('/titles', 'TitlesController@index');

Route::get('/titles/{id}', 'TitlesController@show');

Route::post('/titles', 'TitlesController@store');

Route::patch('/titles/{id}', 'TitlesController@store');

Route::delete('/titles/{id}', 'TitlesController@destroy');


// Genre Routes
Route::get('/genre', 'GenresController@index');

Route::get('/genre/{genre}', 'GenresController@show');

Route::patch('/genre', 'GenresController@store');

// Year Routes
Route::get('/year', 'YearsController@index');

Route::get('/year/{year}', 'YearsController@show');
