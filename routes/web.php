<?php

use Illuminate\Support\Facades\Route;

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
    return view('Welcome');
});


Route::view('a-propos', 'a-propos')->middleware('test'); // le 1er contact c'est l'url, le 2ème contact c'est la vue

// Clients
// Route::get('/clients', 'ClientsController@index');
// Route::get('/clients/create', 'ClientsController@create');
// Route::post('/clients', 'ClientsController@store');
// Route::get('/clients/{client}', 'ClientsController@show');
// Route::get('/clients/{client}/edit', 'ClientsController@edit');
// Route::patch('/clients/{client}', 'ClientsController@update');
// Route::delete('/clients/{client}', 'ClientsController@destroy');

//cette ligne résume toutes les précédentes
Route::resource('clients', 'ClientsController');
// si on écrit : Route::resource('clients', 'ClientsController')->middleware('auth');  ,
//on restreint l'accès aux routes gérées par le ClientsController - Mise en place de Sécurité
//il faut être connecter pour accéder


// Contact
//Route::view('contact', 'contact'); // le 1er contact c'est l'url, le 2ème contact c'est la vue
Route::get('contact', 'ContactController@create')->name('contact.create');// ->name('contact.create') est un exemple d'Helpers pour les URL
Route::post('contact', 'ContactController@store')->name('contact.store'); //Helpers pour les URL

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
