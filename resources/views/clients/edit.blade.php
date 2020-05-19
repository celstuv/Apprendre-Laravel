@extends('layouts.app')
  @section('content')
    <h1>Editer le profil de {{ $client->name }}</h1>
    <br><br>
      <form  action="{{ route ('clients.update',['client' => $client->id]) }}" method="post" enctype="multipart/form-data">
        @method('PATCH')<!--mettre à jour des ressources-->
        @include('includes.form')
        <button type="submit" class="btn btn-primary" name="button">Sauvegarder les informations</button>
      </form>
@endsection
