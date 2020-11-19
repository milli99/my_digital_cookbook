@extends('layouts.app')

@section('content')

            <div class="mb-4" >
                <a class="btn btn-primary" href="/cookbook">Zurück</a>
            </div>


    <form action="{{route('cookbook.update', $recipe->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Name</strong>
                    <input type="text" name="name" value="{{$recipe->name}}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Beschreibung</strong>
                    <input type="text" name="description" value="{{$recipe->description}}" class="form-control" placeholder="Beschreibung">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1"></label>
                <input type="file" name="recipe_image" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Zutaten</strong>
                    <input type="text" name="ingredients" value="{{$recipe->ingredients}}" class="form-control" style="height:150px"  placeholder="Zutaten">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Zubereitung</strong>
                    <input class="form-control" style="height:150px" name="preparation" value="{{$recipe->preparation}}" placeholder="Zubereitung">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Rezept bearbeiten</button>
            </div>
        </div>

    </form>

@endsection
