<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Entreprise;

class ClientsController extends Controller
{
  public function __construct(){
    //sécurisation des routes du controller, excepté index; Ici on voi la liste des clients
    $this->middleware('auth')->except(['index']);

  }

  public function index(){
     $clients = Client::with('entreprise')->paginate(15);
      //on envoie des données dans une variable Clients,  le contenu du tableau clients et on fait de même avec une varible entreprises
       return view('clients.index',compact('clients'));
       //*return view('clients.index',['Client' =>$clients]);  //Ancienne saisie => on envoie des données dans une variable Clients le contenu du tableau clients
   }


   public function create(){
        $this->authorize('create', Client::class); //permettre l'accès de la création du client par l'admin ou personne authorisée uniquement

       $entreprises = Entreprise::all();
       $client = new Client();
       return view('clients.create',compact('entreprises', 'client'));
   }


   public function store(){
     // dd($data);
     $client = Client::create($this->validator());

     $this->storeImage($client);
     // $name = request('name'); //récupération du pseudo du client noté dans le formulaire
     // $email = request('email'); //récupération du pseudo du client noté dans le formulaire
     // $status = request('status'); //récupération du pseudo du client noté dans le formulaire
     // $client = new Client();
     // $client->name = $name;
     // $client->email = $email;
     // $client->status = $status;
     // $client->save();
     return back();
      // dd($pseudo);
   }

   //DEUX METHODES POUR OBTENIR LE DETAIL D'UN CLIENT
        //1ere méthode
   //public function show($client){
          // dd($client); //On test pour savoir si l'id du client est retourné.
      // $client = Client::find($client); //Dans le cas d'un id qui n'existe pas, on peut avoir un message d'erreur.
      // dd($client);//On test pour obtenir les informations de l'id.

      //on met en pratique la méthode suivante. laravel nous retourne le 1er client trouvé ou une erreur 404
      //$client = Client::where('id', $client)->firstOrFail();

      //return view('clients.show', compact('client'));
   //}

      //2ème méthode
   public function show(Client $client){
     return view('clients.show', compact('client'));
     }


   public function edit(Client $client){
     $entreprises = Entreprise::all();
     return view('clients.edit', compact('client', 'entreprises'));
     }


   public function update(Client $client){
     //$data = request()->validate([
       //'name'=>'required|min:3', //Champs pseudo ne peut être vide en BDD et ne peut être inférieur à 3 caractères.
       //'email'=>'required|email', //Champs email ne peut être vide en BDD.
       //'status'=>'required|integer', //s'il n'est pas requis, si ce n'est aps un entier, on renvoi une erreur.
       //'entreprise_id'=>'required|integer' //s'il n'est pas requis, si ce n'est aps un entier, on renvoi une erreur.
     //]);
     $client->update($this->validator());
     $this->storeImage($client);
     return redirect('clients/' . $client->id);
     }


     public function destroy(Client $client){
       $this->authorize('delete', $client); //permettre la suppression du client par l'admin ou personne authorisée uniquement

        $client->delete();
       return redirect('clients');
       }


     private function validator(){
       return request()->validate([
         'name'=>'required|min:3', //Champs pseudo ne peut être vide en BDD et ne peut être inférieur à 3 caractères.
         'email'=>'required|email', //Champs email ne peut être vide en BDD.
         'status'=>'required|integer', //s'il n'est pas requis, si ce n'est aps un entier, on renvoi une erreur.
         'entreprise_id'=>'required|integer', //s'il n'est pas requis, si ce n'est aps un entier, on renvoi une erreur.
         'image'=>'sometimes|image|max:5000'
       ]);
       }

    private function storeImage(Client $client){
      if (request('image')) {
        $client->update([
          'image'=>request('image')->store('avatars', 'public'),
        ]);
      }
    }
}
