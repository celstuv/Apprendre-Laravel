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

Route::get('/phone', function () {
    //Creation de user
    $user = factory('App\User')->create();
    //1ère méthode
        //création d'un n° de tel
          //$phone = new App\Phone();
          //$phone->phone_number = '04 94 00 00 00';
        //traitement de la relation  entre phone et user
          //$user->phone()->save($phone);

    //2eme méthode
    $user->phone()->create([
      'phone_number' => '01 94 00 01 01'
    ]);
});


Route::get('/post', function () {
      //1ère méthode
        //  $user = factory('App\User')->create();

        // $post = new App\Post();
        // $post->title = 'Premier titre';
        // $post->content = 'Premier content';
        // $post->user_id = $user->id;

        // $post->save();

    //2eme méthode
        $user = App\User::first();

        $user->posts()->create([
          'title' => 'Mon deuxième titre',
          'content' => 'Mon deuxième contenu'
        ]);
});


Route::get('/user_role', function () {
      //1ère méthode
        // $user = factory('App\User')->create();
        // $roles = App\Role::all();
        //
        // $user->roles()->attach($roles);

    //2eme méthode
        // $user = App\User::first();
        // $role = App\Role::first();
        //
        // $user->roles()->detach($role);

    //3eme méthode
         $user = App\User::first();

         $user->roles()->attach([1,3]); //ici, il peut y avoir doublon de role pour es utilisateur
         //$user->roles()->sync([1,3]); // ici, on synchronise les rôles des users
});
