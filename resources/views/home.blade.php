@extends('layouts.app')

@section('content')
<div class="container">
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
                    <a href="/cookbook/create" class="btn btn-primary">Create New Recipe</a>
                    <h3>Your Recipes</h3>
                        @if(count($cookbook)>0)
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($cookbook as $recipe)
                            <tr>
                                <td>{{$recipe->name}}</td>
                                <td>
                                    <a href="/cookbook/{{$recipe->id}}/edit" class="btn btn-primary">Edit</a>
                                    <form action="{{route('cookbook.destroy', $recipe->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                        @else
                    <p>You have no Recipes</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
