<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Projet Laravel - Quentin MAILLOT</title>
</head>
<body>

    <nav class="navbar navbar-expand-sm bg-dark mb-5">

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" href="/">PROJET LARAVEL</a>
                </li>
               <li class="nav-item">
                  <a class="nav-link" href="/">Formations</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('categoriesList')}}">Categorie</a>
                </li>
                
                @if (\Illuminate\Support\Facades\Auth::check())
                
                <li class="nav-item bg-success  ms-2 me-2 rounded">
                  <a class="nav-link" href="{{route('profil')}}">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                </li>
                    
                @else
                <li class="nav-item bg-success ms-2 me-2 rounded">
                  <a class="nav-link" href="{{route('login')}}">Se connecter</a>
                </li>
                @endif

                <li class="nav-item">
                  <a class="nav-link" href="{{route('contact')}}">Demande d'inscription</a>
                </li>

                
              </ul>
            </div>
          </nav>
      
      </nav>

      <div style="min-height: 550px">
        @yield('content')
      </div>
    

    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: #212529; color:white">
          © Quentin MAILLOT PROJET LARAVEL
        </div>
        <!-- Copyright -->
      </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>