@extends('layouts.master', ['title' => $title])
@section('content')
    <div class="row">
        <div class="col-sm-12">
            @include('layouts.error')
            <div class="mt-2"></div>
            <div class="card shadow-lg">
                <form action="{{ route('page.store') }}" method="POST">
                    <div class="container">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-sm" value="{{old('nombre')}}" name="nombre" id="nombre" maxlength="255" tabindex="1"/>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-md-12">
                                <input type="email" class="form-control form-control-sm"  value="{{old('correo')}}" name="correo" id="correo" tabindex="2"/>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-md-12 mx-auto">
                                <button class="btn btn-sm btn-primary" type="submit">Guardar</button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2"></div>
                </form>
            </div>
        </div>
    </div>
@endsection
