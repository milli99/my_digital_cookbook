@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Recipe</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/cookbook"> Back</a>
            </div>
        </div>
    </div>

    <form action="{{route('cookbook.update', $recipe->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{$recipe->name}}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Description</strong>
                    <input type="text" name="description" value="{{$recipe->description}}" class="form-control" placeholder="Description">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ingredients</strong>
                    <textarea class="form-control" style="height:150px" name="hallo" value="{{$recipe->ingredients}}" placeholder="Ingredients"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Preparation</strong>
                    <textarea class="form-control" style="height:150px" name="preparation" value="{{$recipe->preparation}}" placeholder="Preparation"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

@endsection