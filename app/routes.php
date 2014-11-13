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

Route::put('recipe/{id}/update_image', 'RecipeController@updateImage');
Route::resource('recipe', 'RecipeController');

//
// Author resource route:

Route::resource('author', 'AuthorController',
  array('only' => array('index', 'create', 'store')));

//
// Ingredient resource route:

Route::put('ingredient/update_orders', 'IngredientController@updateOrders');
Route::resource('ingredient', 'IngredientController',
  array('only' => array('store', 'destroy')));

//
// Step resource route:

Route::put('step/update_orders', 'StepController@updateOrders');
Route::resource('step', 'StepController',
  array('only' => array('store', 'destroy')));