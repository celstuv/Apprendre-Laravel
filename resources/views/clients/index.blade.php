@extends('layouts.app')

@section('content')
  <h1>Clients</h1>
  <a href="/clients/create" class="btn btn-primary my-3"> Nouveau Client</a>

  <hr>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Status</th>
        <th scope="col">Email</th>
        <th scope="col">Entreprise</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($clients as $client)
      <tr>
        <th scope="row">{{ $client->id }}</th>
        <td><a href="/clients/{{$client->id}}">{{ $client->name }}</a></td> <!--création d'una ancre pour faire référence au client de la BDD-->
        <td>{{ $client->status }}</td>
        <td>{{ $client->email }}</td>
        <td>{{ $client->entreprise->name}}</td>
      </tr>
      @endforeach
    </tbody>
</table>
@endsection
