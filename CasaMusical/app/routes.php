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

Route::get('/', function()
{
	return View::make('index');
});

Route::get('products',array('as'=>'products','uses'=>'UtilsController@products'));
Route::get('sales',array('as'=>'sales','uses'=>'SalesController@sales'));

Route::get('editProduct/{id}',array('as'=>'editProduct','uses'=>'ProductsController@editProduct'));
Route::get('editProvider/{id}',array('as'=>'editProvider','uses'=>'ProvidersController@editProvider'));

Route::put('updateProduct',array('as'=>'updateProduct','uses'=>'ProductsController@updateProduct'));

Route::post('newProduct',array('as'=>'newProduct','uses'=>'ProductsController@newProduct'));
Route::post('newSale',array('as'=>'newSale','uses'=>'SalesController@newSale'));
Route::post('newProvider',array('as'=>'newProvider','uses'=>'SalesController@newProvider'));

Route::delete('deleteProduct/{id}',array('as'=>'deleteProduct','uses'=>'ProductsController@deleteProduct'));

Route::get('reorderPointProducts',array('as'=>'reorderPointProducts','uses'=>'UtilsController@reorderPointProducts'));
Route::get('providersList',array('as'=>'providersList','uses'=>'UtilsController@providersList'));
