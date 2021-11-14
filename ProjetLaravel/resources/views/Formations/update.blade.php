@extends('layout')

@section('content')

<div class="container">
    <h1>Modifier la formation</h1>
<form method="post" action="{{route('formationSendUpdate',$formation->id)}}">
    @csrf
    <div class="form-group">
        <label>Nom</label>
        <input type="text" class="form-control" name="name" required value="{{$formation->name}}">
    </div>

    <div class="form-group">
        <label>Picture</label>
        <input type="text" class="form-control" name="picture" required value="{{$formation->picture}}">
    </div>

    <div class="form-group">
        <label>Price</label>
        <input type="number" class="form-control" name="price" required value="{{$formation->price}}">
    </div>
   

    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="5" required >{{$formation->description}}</textarea>
    </div>

    <div class="form-group">
        <label>Type</label>
        <select class="form-select Types" name="types">
            @foreach ($alltypes as $type)
            @if ($types->type_id == $type->id)
                <option value="{{$type->id}}" selected >{{$type->name}}</option>
            @endif
            
            @if ($types->type_id != $type->id)
            <option value="{{$type->id}}">{{$type->name}}</option>
            @endif
            
            @endforeach

        </select>
    </div>

    <div class="form-group">
        <label>Categories</label><br>
        <select class="form-select Types" name="categories">
            @foreach ($allcategories as $category)
            @if ($categories->category_id == $category->id)
            <option value="{{$category->id}}" selected>{{$category->name}}</option>
            @endif
            @if ($categories->category_id != $category->id)
            <option value="{{$category->id}}">{{$category->name}}</option>

            @endif
            @endforeach
        </select>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Modifier la formation</button>
</form>
    
</div>
@endsection