@extends('layouts.app')

@section('content')
    <h1>Recipes</h1>
    @if(count($recipes) > 0)
        @foreach($recipes as $recipe)
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="..." class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><a href="/cookbook/{{$recipe->id}}">{{$recipe->name}}</a></h5>
                            <p class="card-text">{{$recipe->description}}</p>
                            <p class="card-text"><small class="text-muted">{{$recipe->created_at}}</small></p>
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
