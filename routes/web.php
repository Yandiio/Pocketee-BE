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

/**
 * 
 * Budget Route
 * 
 */
$router->group(['prefix' => 'budget'], function() use ($router) {
    $router->post('/create', 'BudgetController@create');
    $router->get('/', 'BudgetController@listBudget');
});

/**
 * 
 * Wallet Route
 * 
 */
$router->group(['prefix' => 'wallet'], function() use ($router) {
    $router->post('/create', 'WalletController@create');
    $router->get('/', 'WalletController@listWallet');
    $router->put('/update', 'WalletController@update');
});
