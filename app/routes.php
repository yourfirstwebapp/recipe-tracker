<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return View::make('hello');
// });


// CSRF protection for all POST submissions
Route::when('*', 'csrf', array('post', 'delete', 'put', 'patch'));


//
// Static pages:

Route::get('/', 'PageController@index');
Route::get('/about', 'PageController@about');
Route::get('/contact', 'PageController@contact');

//
// Recipe resource route:

Route::resource('recipe', 'RecipeController');

//
// Ingredient resource route:

Route::resource('ingredient', 'IngredientController',
  array('only' => array('store', 'destroy')));

//
// Step resource route:

Route::resource('step', 'StepController',
  array('only' => array('store', 'destroy')));