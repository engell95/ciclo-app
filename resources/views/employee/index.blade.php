@extends('layouts.master', ['title' => $title])
@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-sm table-response mt-2">
            <thead>
                <th>#</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($Employees as $employee)
                <tr>
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->address}}</td>
                    <td>{{$employee->phone}}</td>
                    <td>
                        <form action="{{route('page.store')}}" method="POST">
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
