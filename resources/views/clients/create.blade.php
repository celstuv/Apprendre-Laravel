@extends('layouts.app')
  @section('content')
    <h1>Création d'un nouveau client</h1>
    <br><br>
      <form  action="/clients" method="post">
        @include('includes.form')
        <button type="submit" class="btn btn-primary" name="button">Ajouter le client</button>
      </form>
@endsection
