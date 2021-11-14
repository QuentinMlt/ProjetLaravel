@extends('layout')

@section('content')
    <div class="container">
        <h1>{{$formation->name}}</h1>
        
        

        <div class="row">
            <div class="col-md-6">
                <h2>Ecrit le {{$formation->created_at->format('d/m/Y')}}</h2>
                <p>{{$formation->description}}</p>
            </div>
            <div class="col-md-6">
                <form method="POST" action="{{route('formationSendUpdatePicture', $formation->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Modifier l'image</label>
                        <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" name="picture" required>
                    </div><br>

                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
        @if(sizeof($formation->chapters) > 0)
            @foreach ($formation->chapters as $chapter)
            <div class="container mt-5" style="word-wrap: break-word;">
                <h2>{{$chapter->name}}</h2>
                <p>{{$chapter->content}}</p>
                <form action="{{route('chapterDelete', $chapter->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"> Supprimer le chapitre</button>

                </form>
            </div>
            @endforeach
        @else
            <p>Cette formation ne contient aucun chapitre</p>
        @endif
        <hr>
        
        <form action="{{route('chapterAdd', $formation->id)}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nom du chapitre</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>Contenu du chapitre</label>
                <textarea name="content" class="form-control"></textarea>
            </div><br>
            <button type="submit" class="btn btn-primary">Ajouter à la formation</button>
        </form><br>

        <a href="{{route('formationsList')}}" class="btn btn-success">Voir toutes les formations</a><br><br>

        <form method="POST" action="{{route('formationDelete',$formation->id)}}">
         @csrf
         @method('DELETE')
         <button class="btn btn-danger">Supprimer cette article</button>
        </form>


    </div>
@endsection