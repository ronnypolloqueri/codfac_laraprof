@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	@foreach($posts as $post)
            <div class="card">
                <div class="card-header">{{$post->titulo}}</div>

                <div class="card-body">
                    {{ $post->post }}
                </div>
                <div class="card-footer text-right">
                    <a class="btn btn-info" 
                    href="{{route('posts.show', ['post' => $post]) }}">Ver</a>
                </div>
            </div>
            <br>
            @endforeach
        </div>
    </div>
</div>
@endsection