@extends('layouts.app')

@section('content')
    <div class="btn-toolbar mb-4" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group mr-2 mx-auto" role="group" aria-label="First group">
            <a type="button" class="btn btn-primary" href="{{ route('cookbook.index') }}">Rezepteübersicht</a>
            <a type="button"  class="btn btn-outline-primary" href="{{ route('cookbook.create') }}" >Neues Rezept erstellen</a>
            <a type="button"  class="btn btn-outline-primary" href="/home" >Meine Rezepte</a>
        </div>
    </div>

    @if(count($recipes) > 0)
        @foreach($recipes as $recipe)
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col">
                        <img height="100%" width="100%" src="/storage/recipe_images/{{$recipe->recipe_image}}" class="card-img" alt="...">
                        <img height="100%" width="100%" src="{{asset('/storage/recipe_images'.$recipe->recipe_image)}}" class="card-img" alt="...">
                    </div>

                        <div class="card-body">
                            <div class="col-5">
                            <h5 class="card-title"><a href="/cookbook/{{$recipe->id}}">{{$recipe->name}}</a></h5>
                            <p class="card-text">{{$recipe->description}}</p>
                            <p class="card-text"><small class="text-muted">{{$recipe->created_at}}</small></p>
                            @if(!Auth::guest())
                                @if(Auth::user()->id == $recipe->user_id)

                            </div>
                            <div class="col">
                                        <a href="/cookbook/{{$recipe->id}}/edit" class="btn btn-primary">Edit</a>
                                        <form action="{{route('cookbook.destroy', $recipe->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                            @endif
                                        @endif
                            </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{$recipes->links()}}
    @else
    <p>No Recipes found</p>
    @endif
@endsection
