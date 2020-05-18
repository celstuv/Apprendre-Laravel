<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Styles -->
    </head>
    <body>
        <div class="container">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link active" href="/">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/a-propos">A propos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact">Contactez-nous</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/clients">Voir nos clients</a>
            </li>
          </ul>
          @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
              {{ session()->get('message') }}
            </div>
          @endif

          @yield('content')



        </div>
    </body>
</html>
