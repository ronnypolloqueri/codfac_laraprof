@extends('layouts.app')

@section('content')

@if(Session::has('message'))
<div class="container alert alert-success">
    {{ Session::get('message') }}
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	@foreach($posts as $post)

            <div class="card">
                <div class="card-header">{{$post->titulo}}</div>

                <div class="card-body">
                    {{ $post->contenido }}
                </div>
                <div class="d-flex justify-content-end ml-2">

            @can('view', $post);
                	<form action="{{route('posts.destroy', ['post' => $post ])}}" method="POST">
                		@csrf
                		@method('DELETE')
                		<input class="btn btn-danger" type="submit" value="Eliminar">
                	</form>
                    
            @endcan
                    <a class="btn btn-primary" 
                    href="{{route('posts.edit', ['post' => $post]) }}">Editar</a>
                    <a class="btn btn-info" 
                    href="{{route('posts.show', ['post' => $post]) }}">Ver</a>

                </div>
            </div>
            <br>
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection