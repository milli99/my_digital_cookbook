@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="btn-toolbar mb-4" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2 mx-auto" role="group" aria-label="First group">
                    <a type="button" class="btn btn-outline-primary" href="{{ route('cookbook.index') }}">Rezepteübersicht</a>
                    <a type="button"  class="btn btn-primary" href="{{ route('cookbook.create') }}" >Neues Rezept erstellen</a>
                    <a type="button"  class="btn btn-outline-primary" href="/home" >Meine Rezepte</a>
                </div>
            </div>
        </div>
    </div>

    <form action="{{route('cookbook.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Description</strong>
                    <input type="text" name="description" class="form-control" placeholder="Description">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Example file input</label>
                <input type="file" name="recipe_image" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ingredients</strong>
                    <textarea class="form-control" style="height:150px" name="ingredients" placeholder="Ingredients"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Preparation</strong>
                    <textarea class="form-control" style="height:150px" name="preparation" placeholder="Preparation"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

@endsection
