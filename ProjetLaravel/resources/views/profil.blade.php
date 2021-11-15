@extends('layout')

@section('content')

<div class="container">
    <h1>Page profil - {{$user->name}}</h1>

    <form method="POST" action="{{route('editUser')}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nom d'utilisateur</label>
            <input type="text" name="name" required class="form-control" value="{{$user->name}}">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" readonly class="form-control" value="{{$user->email}}">
        </div>
        
        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Modifier les informations</button>
    </form>

    @if ($user->role == "admin")
    <hr>
        <h2>Tableau des utilisateurs</h2>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($allUsers as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
    @endif


        <form method="post" action="{{route('logout')}}">
            @csrf
            <button type="submit" class="btn btn-danger">Déconnexion</button>
        </form>

</div>
    
@endsection