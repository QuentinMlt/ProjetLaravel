@extends('layout')

@section('content')
    <div class="container-sm">
        <h1>Liste de toutes les catégories</h1>

        <div class="border border-danger ms-5 me-5 p-1 rounded" style="height: 200px;">
            @foreach ($categories as $category)
                    <div class="badge bg-danger text-wrap">
                        @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == "admin")
                        <form action="{{route('categoryUpdate', $category->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="text" name="name" required value="{{$category->name}}">
                            </div>
                            <button class="btn" type="submit">🔄</button>
                        </form>
                        <form method="POST" action="{{route('categoryDelete', $category->id)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="badge bg-dark text-wrap">❌</button>
                        </form>
                        @else
                        #{{$category->name}}
                        @endif
                        
                    </div>
            @endforeach
        </div>
        <a href="{{route('categoryAdd')}}" class="btn btn-primary mt-2 ms-5">Ajouter une catégorie</a>
    </div>
@endsection