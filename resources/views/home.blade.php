@extends('layouts.app')

@section('content')
<div class="container">
    <div class="btn-toolbar mb-4" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group mr-2 mx-auto" role="group" aria-label="First group">
            <a type="button" class="btn btn-outline-primary" href="{{ route('cookbook.index') }}">Rezepteübersicht</a>
            <a type="button"  class="btn btn-outline-primary" href="{{ route('cookbook.create') }}" >Neues Rezept erstellen</a>
            <a type="button"  class="btn btn-primary" href="/home" >Meine Rezepte</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Meine Rezepte</h3>
                        @if(count($cookbook)>0)
                    <table class="table table-striped">
                        <tr>
                            <th>Bild</th>
                            <th>Name</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($cookbook as $recipe)
                            <tr>
                                <td><img height="100px" src="/storage/recipe_images/{{$recipe->recipe_image}}" alt="Bild"></td>
                                <td><a href="/cookbook/{{$recipe->id}}">{{$recipe->name}}</a></td>
                                <td>
                                    <a href="/cookbook/{{$recipe->id}}/edit" class="btn btn-primary">Bearbeiten</a>
                                </td>
                                <td>
                                    <form action="{{route('cookbook.destroy', $recipe->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Löschen</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                        @else
                    <p>Du besitzt keine Rezepte</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
