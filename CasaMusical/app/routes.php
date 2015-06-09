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
Route::get('providers',array('as'=>'sales','uses'=>'ProvidersController@providers'));

Route::get('editProduct/{id}',array('as'=>'editProduct','uses'=>'ProductsController@editProduct'));
Route::get('editProvider/{id}',array('as'=>'editProvider','uses'=>'ProvidersController@editProvider'));

Route::put('updateProduct',array('as'=>'updateProduct','uses'=>'ProductsController@updateProduct'));
Route::put('updateProvider',array('as'=>'updateProvider','uses'=>'ProvidersController@updateProvider'));

Route::post('newProduct',array('as'=>'newProduct','uses'=>'ProductsController@newProduct'));
Route::post('newSale',array('as'=>'newSale','uses'=>'SalesController@newSale'));
Route::post('newProvider',array('as'=>'newProvider','uses'=>'ProvidersController@newProvider'));

Route::delete('deleteProduct/{id}',array('as'=>'deleteProduct','uses'=>'ProductsController@deleteProduct'));
Route::delete('deleteProvider/{id}',array('as'=>'deleteProvider','uses'=>'ProvidersController@deleteProvider'));
Route::delete('restoreSale/{id}',array('as'=>'restoreSale','uses'=>'SalesController@restoreSale'));

Route::get('reorderPointProducts',array('as'=>'reorderPointProducts','uses'=>'UtilsController@reorderPointProducts'));
Route::get('providersList',array('as'=>'providersList','uses'=>'UtilsController@providersList'));
Route::get('ordersReport',array('as'=>'ordersReport','uses'=>'ReportsController@ordersReport'));
Route::get('productsCatalog',array('as'=>'productsCatalog','uses'=>'ReportsController@productsCatalog'));
Route::get('productsByProvider/{id}',array('as'=>'productsByProvider','uses'=>'ProductsController@productsByProvider'));

