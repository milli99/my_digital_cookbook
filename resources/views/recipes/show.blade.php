@extends('layouts.app')

@section('content')
    <div class="btn-toolbar mb-4" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group mr-2 mx-auto" role="group" aria-label="First group">
            <a type="button" class="btn btn-outline-primary" href="{{ route('cookbook.index') }}">Overview of my recipes</a>
            <a type="button"  class="btn btn-outline-primary" href="{{ route('cookbook.create') }}" >Create new recipes</a>
            <a type="button"  class="btn btn-outline-primary" href="/home" >Dashboard</a>
        </div>
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
        <form action="{{route('cookbook.destroy', $recipe->id)}}" method="POST">
            <a href="/cookbook/{{$recipe->id}}/edit" class="btn btn-primary">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    @endif
@endsection
