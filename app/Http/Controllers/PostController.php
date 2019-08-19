<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('posts.index', ['posts' => $posts]);
    }

    public function myposts()
    {
        $user_id = \Auth::user()->id;
        $posts = Post::where('user_id', $user_id)->paginate(5);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parameters = $request->all();
        $user_id = \Auth::user()->id;
        $parameters['user_id'] = $user_id;
        Post::create($parameters);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('delete', $post);
        $post->update($request->post);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {       
        /* si quisiera validar para otro usuario podría hacer esto */
        //if (Gate::forUser($other_user)->denies('delete-post', $post)){
        /* lo contrario a denies es allows */
        //if (Gate::denies('delete-post', $post)){
        if (Gate::denies('delete-post', $post)){
            return redirect()->back()->with(['message' => 'No estas autorizado para eliminar este post.']);
        }

        // cumple la misma funcion que Gate pero usando policies
        //$this->authorize('delete', $post);

        $post->delete();
        return redirect()->route('posts.index');
    }
}
