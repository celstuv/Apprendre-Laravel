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


Route::view('a-propos', 'a-propos'); // le 1er contact c'est l'url, le 2ème contact c'est la vue

// Clients
// Route::get('/clients', 'ClientsController@index');
// Route::get('/clients/create', 'ClientsController@create');
// Route::post('/clients', 'ClientsController@store');
// Route::get('/clients/{client}', 'ClientsController@show');
// Route::get('/clients/{client}/edit', 'ClientsController@edit');
// Route::patch('/clients/{client}', 'ClientsController@update');
// Route::delete('/clients/{client}', 'ClientsController@destroy');
Route::resource('clients', 'ClientsController'); //cette ligne résume toutes les précédentes

// Contact
//Route::view('contact', 'contact'); // le 1er contact c'est l'url, le 2ème contact c'est la vue
Route::get('contact', 'ContactController@create');
Route::post('contact', 'ContactController@store');
