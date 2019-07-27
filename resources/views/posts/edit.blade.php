@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Editar Post</div>

                <div class="card-body">
                	<form action="{{ route('posts.update', ['post'=> $post]) }}" method="POST">
                		@method('PUT')
                		@csrf
                		<input class="form-control" type="" name="titulo" value="{{$post->titulo}}">
                		<br>
                		<textarea class="form-control" name="post">
                			{{$post->post}}
                		</textarea>
                		<br>
                		<div class="d-flex justify-content-end ml-2">
                			
                   			 <a class="btn btn-info ml-2" 
                    href="{{route('posts.index') }}">Volver</a>
                			<input class="btn btn-primary ml-2" type="submit" value="Actualizar">
                		</div>
                	</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection