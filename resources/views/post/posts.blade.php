@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12 mt-3">
        <div class="col-12">
            <h2 class="mt-3 mb-3">My Article</h2>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <a class="btn btn-sm btn-primary" href="{{route('post.create')}}">NEW ARTICLE</a>
            </div>
        </div>
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-6 mt-3">
                <div class='card mb-4'>
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">
                            {{$post->get_excerpt}}
                            <a href="{{route('post.show',$post)}}">Leer mas</a>
                        </p>
                        <p class="text-muted mb-0">
                            <em>
                                &ndash; {{$post->user->name}}
                            </em>
                            {{$post->created_at->format('d M Y')}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-12 text-center">
            {{ $posts->links("pagination::bootstrap-4") }}
        </div>
    </div>
</div>
@endsection
