@extends('layouts.app')

@section('content')
    <div class="pull-right">
        <a class="btn btn-primary" href="/cookbook"> Back</a>
    </div>
    <h1>{{$recipe->name}}</h1>

    <div>
        <p>{{$recipe->description}}</p>
        <p>{{$recipe->ingredients}}</p>
        <p>{{$recipe->preparation}}</p>
    </div>
    <hr>
    <small>Written at {{$recipe->created_at}}</small>
    <hr>
    <a href="/cookbook/{{$recipe->id}}/edit" class="btn btn-outline-primary">Edit</a>

@endsection
