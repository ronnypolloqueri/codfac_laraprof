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
            <div class="card">
                <div class="card-header">Crea un nuevo post</div>

                <div class="card-body">
                    <form action="{{route('posts.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input type="text" name="titulo">
                        </div>
                        <div class="form-group">
                        <label for="contenido">Contenido</label>
                        <textarea name="contenido" id="" cols="30" rows="10"></textarea>
                            
                        </div>
                        <input class="btn btn-primary" type="submit" value="Crear">
                    </form>

                <div class="d-flex justify-content-end ml-2">

                    <a class="btn btn-info" 
                    href="{{route('posts.index') }}">Volver</a>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection