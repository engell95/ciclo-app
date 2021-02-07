@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">
            @include('layouts.error')
            <div class='card shadow-lg'>
                <div class="card-body">
                    <h5 class="card-title border-bottom">NEW ARTICLE</h5>
                    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 pt-2">
                            <label for="Title" class="form-label">Title *</label>
                            <input type="text" class="form-control" id="Title" name="Title" placeholder="Title" required>
                        </div>
                        <div class="mb-3">
                            <label for="Image" class="form-label">Image</label>
                            <input class="form-control" type="file" id="Image" name="Image">
                        </div>
                        <div class="mb-3">
                            <label for="Content" class="form-label">Content *</label>
                            <textarea class="form-control" rows="6" placeholder="Content the my article" id="Content" name="Content" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="Iframe" class="form-label">Iframe</label>
                            <textarea class="form-control" placeholder="Content the my article" id="Iframe" name="Iframe"></textarea>
                        </div>
                        <div class="d-grid gap-2 d-md-block">
                            <a class="btn btn-secondary" type="button" href="{{ redirect()->back()->getTargetUrl() }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-backward" viewBox="0 0 16 16">
                                    <path d="M.5 3.5A.5.5 0 0 1 1 4v3.248l6.267-3.636c.52-.302 1.233.043 1.233.696v2.94l6.267-3.636c.52-.302 1.233.043 1.233.696v7.384c0 .653-.713.998-1.233.696L8.5 8.752v2.94c0 .653-.713.998-1.233.696L1 8.752V12a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5zm7 1.133L1.696 8 7.5 11.367V4.633zm7.5 0L9.196 8 15 11.367V4.633z"/>
                                </svg>
                                REGRESAR
                            </a>
                            <button class="btn btn-primary" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                    <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
                                </svg>
                                GUARDAR
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
