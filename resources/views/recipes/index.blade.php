@extends('layouts.app')

@section('content')
    <div class="btn-toolbar mb-4" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group mr-2 mx-auto" role="group" aria-label="First group">
            <a type="button" class="btn btn-primary" href="{{ route('cookbook.index') }}">Rezepteübersicht</a>
            <a type="button"  class="btn btn-outline-primary" href="{{ route('cookbook.create') }}" >Neues Rezept erstellen</a>
            <a type="button"  class="btn btn-outline-primary" href="/home" >Meine Rezepte</a>
        </div>
    </div>
    <!--<div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Suche</span>
        </div>
        <input type="text" id="search" name="search" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>-->

    @if(count($recipes) > 0)
        @foreach($recipes as $recipe)
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/storage/recipe_images/{{$recipe->recipe_image}}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                          <h5 class="card-title"><a href="/cookbook/{{$recipe->id}}">{{$recipe->name}}</a></h5>
                            <p class="card-text">{{$recipe->description}}</p>
                            <p class="card-text"><small class="text-muted">Erstellt am {{$recipe->created_at}}</small></p>
                            @if(!Auth::guest())
                                @if(Auth::user()->id == $recipe->user_id)

                            <form action="{{route('cookbook.destroy', $recipe->id)}}" method="POST">
                                <a href="/cookbook/{{$recipe->id}}/edit" class="btn btn-primary">Bearbeiten</a>
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger">Löschen</button>
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
    <p>Du besitzt keine Rezepte</p>
    @endif

    <!--<script type="text/javascript">
        $('#search').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
                type : 'get',
                url : '{{URL::to('search')}}',
                data:{'search':$value},
                success:function(data){
                    $('tbody').html(data);
                }
            });
        })
    </script>
    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>-->
@endsection
