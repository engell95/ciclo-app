@extends('layouts.master', ['title' => $title])
@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-sm table-response mt-2">
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
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>
                        <form action="{{route('post.destroy', $post)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
