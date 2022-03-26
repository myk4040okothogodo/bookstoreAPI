<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['prefix' => 'api'], function () use ($router) {

    //endpoint for fetching data from external API
    $router->get('fetch', ['uses'  => 'BookController@fetch']);

    // endpoints for books  
    $router->get('books',      ['uses' => 'BookController@showAllBooks']);
    $router->get('books/{id}', ['uses' => 'BookController@showOneBook']);
    

    //endpoints for characters
    $router->get('sortcharacters',  ['uses' => 'CharacterController@sortCharacters']);
    $router->get('filtercharacters',  ['uses' => 'CharacterController@showFilteredCharacters']);
    $router->get('characters',      ['uses' =>'CharacterController@showAllCharacters']);
    $router->get('characters/{id}', ['uses' => 'CharacterController@showOneCharacter']);
    
    
    //endpoints for comments
    $router->get('comments',      ['uses' =>'CommentController@showAllComments']);
    $router->get('comments/{id}', ['uses' => 'CommentController@showOneComment']);
    $router->post('comments',     ['uses' => 'CommentController@create']);
    $router->delete('comments/{id}',['uses'=>'CommentController@delete']);
    $router->put('comments/{id}', ['uses' => 'CommentController@update']);

});
