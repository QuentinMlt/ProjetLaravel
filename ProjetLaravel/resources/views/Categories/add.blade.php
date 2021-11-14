@extends('layout')

@section('content')
    <div class="container">
        <h1>Ajouter une nouvelle categorie</h1>

        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif

        <form method="post" action="{{route('categoryStore')}}">
            @csrf
            <div class="form-group">
                <label>Nom</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Ajouter la categorie</button>
        </form>

    </div>
@endsection