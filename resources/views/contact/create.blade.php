@extends('layouts.app')

@section('content')
  <h1>Contactez-nous !</h1>
  <hr>
  @if (!session()->has('message'))
    <form action="{{ route('contact.store') }}" method="post">
        @csrf <!-- Vérification de l'identité du client-->
          <div class="form-group">
             <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
             placeholder="Taper votre pseudo" value="{{ old('name')}}"> <!--old('value') : Si je entre une information erronée, l'ancienne information est conservée-->
            @error('name')
              <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @enderror
          </div>
          <div class="form-group">
            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email"
            placeholder="Taper votre email" value="{{ old('email')}}">
            @error('email')
              <div class="invalid-feedback">{{ $errors->first('email') }}</div>
            @enderror
          </div>
          <div class="form-group">
            <textarea name="message" rows="8" cols="80" class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
              @error('message')
                <div class="invalid-feedback">{{ $errors->first('message') }}</div>
              @enderror
          </div>
          <button type="submit" name="button" class="btn btn-primary">Envoyer mon message</button>
      @endsection
    </form>
  @endif
