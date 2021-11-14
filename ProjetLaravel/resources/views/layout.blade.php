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
              </ul>
            </div>
          </nav>
      
      </nav>

    @yield('content')

    <footer class="bg-light text-center text-lg-start fixed-bottom">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: #212529; color:white">
          © Quentin MAILLOT PROJET LARAVEL
        </div>
        <!-- Copyright -->
      </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>