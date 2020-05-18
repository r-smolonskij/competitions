<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();
// Route::get('/post', 'PostController@create');
Route::get('/clearcache', function(){ Artisan::call('cache:clear');});
Route::get('/clearconfig', function(){ Artisan::call('config:cache');});
Route::get('/clearview', function(){ Artisan::call('view:cache');});
Route::get('/storagelink', function(){ Artisan::call('storage:link');});

Route::get('/key', function(){ Artisan::call('key:generate');});

Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

Route::get('/result/{result}/destroy', 'ResultController@destroy');
Route::post('/event/{event}/result-add', 'ResultController@store');
Route::patch('/event/{event}/{result}/result-update', 'ResultController@update');

Route::get('/competition/{competition}/event/create', 'EventController@create');
Route::post('/competition/{competition}/event/creating', 'EventController@store');
Route::patch('/event/{event}/updating', 'EventController@update');
Route::get('/event/{event}/edit', 'EventController@edit');
Route::get('/event/{event}/destroy', 'EventController@destroy');
Route::patch('/event/{event}/updating', 'EventController@update');
Route::get('/event/{event}', 'EventController@show');

Route::get('/competitions/my-competitions/{slug1}/{slug2}', 'CompetitionController@myCompetitionsShowAllByType');
Route::get('/competitions/my-competitions/{slug}', 'CompetitionController@myCompetitionsShowAll');
Route::get('/competitions/my-competitions', 'CompetitionController@myCompetitions');
Route::get('/competitions/competitions-history', 'CompetitionController@competitionsHistory');
Route::get('/competitions/{slug1}/{slug2}', 'CompetitionController@showByType');
Route::get('/competitions/{slug}', 'CompetitionController@index');
Route::get('/competition/create', 'CompetitionController@create');
Route::get('/competition/{competition}/destroy', 'CompetitionController@destroy');
Route::get('/competition/{competition}/edit', 'CompetitionController@edit');
Route::patch('/competition/{competition}/updating', 'CompetitionController@update');
Route::post('/competition/creating', 'CompetitionController@store');
Route::get('/competition/{competition}', 'CompetitionController@show');


