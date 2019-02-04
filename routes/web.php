<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('/offre', 'OffreController');
Route::get('/offre/showoffre/{userid}', 'OffreController@showoffre')->name('offre.showoffre');
Route::get('/offre/showoffredetails/{offreid}', 'OffreController@showoffredetails')->name('offre.showoffredetails');
Route::get('/offres/echange', 'OffreController@echange')->name('offre.echange');
Route::get('/offres/don', 'OffreController@don')->name('offre.don');
Route::get('/offres/reponse/{offreid}', 'OffreController@reponse')->name('offre.reponse');
Route::post('/offres/donstore', 'OffreController@donstore')->name('offre.donstore');
Route::post('/offres/echangestore', 'OffreController@echangestore')->name('offre.echangestore');
Route::get('/offres/confirmresponsedon{respid}', 'OffreController@confirmresponsedon')->name('offre.confirmresponsedon');
Route::get('/offres/confirmresponseechange{respid}', 'OffreController@confirmresponseechange')->name('offre.confirmresponseechange');

//
Route::resource('/produit', 'ProduitController');
Route::resource('/users', 'UserController');
Route::resource('/magasins', 'MagasinController');
Route::resource('/labos', 'LaboController');


Route::group(['prefix'=>'admin'],function(){
   // Route::resource('/users', 'UserController');
});
