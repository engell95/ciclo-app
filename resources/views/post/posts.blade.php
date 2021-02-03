@extends('layouts.master', ['title' => $title])
@section('content')
<div class="row">
    <div class="col-md-8">
        @foreach ($posts as $post)
        <div class='card'>
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">
                    {{$post->get_excerpt}}
                    <a href="{{ route('post',$post)}}">Leer mas</a>
                </p>
                <p class="text-muted mb-0">
                    <em>
                        &ndash; {{$post->user->name}}
                    </em>
                    {{$post->created_at->format('d M Y')}}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
