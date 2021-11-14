@extends('layout')

@section('content')
    <div class="container">
        <h1>Ajouter une nouvelle formation</h1>

        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif

        <form method="post" action="{{route('formationStore')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nom</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" name="picture" required>
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control" name="price" required>
            </div>
           

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <label>Type</label>
                <select class="form-select Types" name="types">
                    <option selected>Voir les types</option>
                    @foreach ($types as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>Categories</label><br>
                @foreach ($categories as $category)
                <div class="form-check form-check-inline Categories">
                    <input class="form-check-input" type="radio" id="radio1" value={{$category->id}} name="categories" />
                    <label class="form-check-label" for="radio1">{{$category->name}}</label>
                    </div>
                @endforeach
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Ajouter la formation</button>
        </form>

    </div>
@endsection