<?php

use Illuminate\Http\Request;

// Titles Routes
Route::get('/titles', 'TitlesController@index');

Route::get('/titles/{id}', 'TitlesController@show');

Route::post('/titles', 'TitlesController@store');

Route::patch('/titles/{id}', 'TitlesController@store');

Route::delete('/titles/{id}', 'TitlesController@destroy');


// Genre Routes
Route::get('/genres', 'GenresController@index');

Route::get('/genres/{genre}', 'GenresController@index');

Route::patch('/genres', 'GenresController@index');

