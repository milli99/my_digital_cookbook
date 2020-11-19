@extends('layouts.app')

@section('content')
    <div class="mb-4" >
        <a class="btn btn-primary" href="/cookbook">Zurück</a>
    </div>
    <h1>{{$recipe->name}}</h1>
    <div>
        <p>{{$recipe->description}}</p>
        <img src="/storage/recipe_images/{{$recipe->recipe_image}}" class="card-img" alt="...">
        <br>
        <br>
        <p>{{$recipe->ingredients}}</p>
        <p>{{$recipe->preparation}}</p>
    </div>
    <hr>
    <small>Written at {{$recipe->created_at}}</small>
    <hr>
    @if(!Auth::guest())
    @endif
@endsection
