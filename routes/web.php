<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//---------------------------- user authentication ----------------------------
$router->post(
  'auth/login', 
  [
     'uses' => 'AuthController@authenticate'
  ]
);

//---------------------------- note CRUD --------------------------------
$router->group(['prefix' => 'api'], function () use ($router) {
  $router->get('notes',  ['uses' => 'NoteController@showAllNotes']);

  $router->get('notes/show/{id}', ['uses' => 'NoteController@showOneNote']);

  $router->post('notes/create', ['uses' => 'NoteController@create']);

  $router->delete('notes/delete/{id}', ['uses' => 'NoteController@delete']);

  $router->put('notes/update/{id}', ['uses' => 'NoteController@update']);
});