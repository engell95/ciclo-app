<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Posts = Post::paginate();
        return view('post.index',['Posts'=>$Posts,'title'=>'Post']);
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function posts()
    {
        //
        $Posts = Post::paginate();
        return view('post.posts',['posts'=>$Posts,'title'=>'MY ARTICLE']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('post.create',['title'=>'NEW ARTICLE']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $post = Post::create([
            'iduser'    => auth()->user()->id,
            'title'     => $request->Title,
            'body'      => $request->Content,
            'iframe'    => $request->Iframe,
            'slug'      => $request->slug
        ]);

        if($request->file('Image')){
            $post->image = $request->file('Image')->store('posts','public');
            $post->save();
        }

        return redirect(route('post.posts'))->with('status','Creado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show',['post' => $post,'title' =>'SHOW ARTICLE']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit',['post' => $post,'title' =>'EDIT ARTICLE']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update([
            'title'  => $request->Title,
            'body'   => $request->Content,
            'iframe' => $request->iframe
        ]);

        if($request->file('Image')){
            Storage::disk('public')->delete($post->image);
            $post->image = $request->file('Image')->store('posts','public');
            $post->save();
        }

        return redirect(route('post.posts'))->with('status','Editado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::disk('public')->delete($post->image);
        $post->delete();
        return back()->with('status','Eliminado con Exito');
    }
}
