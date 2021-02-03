<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function posts(){
        return view('post.posts',[
            'posts' => Post::with('user')->latest()->paginate(),
            'title' =>'Posts'
        ]);
    }

    public function post(Post $post){
        return view('post.post',['post' => $post,'title' =>'Post']);
    }
}
