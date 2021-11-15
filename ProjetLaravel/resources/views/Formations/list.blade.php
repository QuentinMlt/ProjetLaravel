@extends('layout')

@section('content')


<div class="container-sm mt-5" style="margin-bottom: 100px;">
    <h1>Liste des formations</h1>
    @if (\Illuminate\Support\Facades\Auth::check())
        <a href="{{route('formationAdd')}}" class="btn btn-success">Ajouter une formation</a>
    @endif
    
    @if (sizeof($formations) > 0)

    <div class="row">

        @foreach ($formations as $formation)

        <div class="col-md-4 d-flex align-items-stretch position-relative mt-4">

            <div class="card" style="width: 18rem;">
                <img src="{{asset("storage/$formation->picture")}}" class="card-img-top" style="object-fit:contain;max-height: 200px;" max-height="10" >
                <div class="card-body">
                  <h5 class="card-title">{{$formation->name}}</h5>
                  <div class="badge bg-success text-wrap">{{$formation->price}} €</div>
                  <p class="card-text">{{$formation->description}}</p>
                  <p class="card-text">{{sizeof($formation->chapters)}} chapitre(s)</p>
                  <p>Ecrit par {{$formation->user->name}}</p>

                    @foreach ($formationsByTypes as $fBT)
                        @if ($fBT->formation_id == $formation->id)
                            @foreach ($types as $type)
                                @if ($fBT->type_id == $type->id)
                                    <div class="badge badge bg-primary text-wrap">{{$type->name}}</div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    <br />
                    @foreach ($formationsByCategories as $fBC)
                        @if ($fBC->formation_id == $formation->id)
                             @foreach ($categories as $category)
                                @if ($fBC->category_id == $category->id)
                                    <div class="badge bg-danger text-wrap">#{{$category->name}}</div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    <br />
                    <center>
                        <a href="{{route('formationDetails',$formation->id )}}" class=" mt-1 mb-2 btn btn-success">Voir</a>
                        <a href="{{route('formationUpdate',$formation->id )}}" class=" mt-1 mb-2 btn btn-primary">Modifier</a>
                        <form method="POST" action="{{route('formationDelete',$formation->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </center>
                </div>
            </div>
            

        </div>

        @endforeach

    </div>
    
    @else
    <div class="alert alert-primary" role="alert">
        Il n'y a aucune formation.
      </div>
    @endif

</div>



    

@endsection