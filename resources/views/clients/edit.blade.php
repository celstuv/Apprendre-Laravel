@extends('layout')
  @section('content')
    <h1>Editer le profil de {{ $client->name }}</h1>
    <br><br>
      <form  action="/clients/{{ $client->id }}" method="post">
        @method('PATCH')<!--mettre à jour des ressources-->
        @include('includes.form')
        <button type="submit" class="btn btn-primary" name="button">Sauvegarder les informations</button>
      </form>
@endsection
