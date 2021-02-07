@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-3 mb-3">History Article</h2>
            <table class="table table-sm table-response table-hover mt-2">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Descripcion</th>
                    <th>Usuario</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($Posts as $post)
                    <tr>
                        <td>
                            <a href="{{route('post.show',$post)}}">
                                {{$post->id}}
                            </a>
                        </td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->slug}}</td>
                        <td>{{$post->user->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $Posts->links("pagination::bootstrap-4") }}
        </div>
    </div>
</div>
@endsection
