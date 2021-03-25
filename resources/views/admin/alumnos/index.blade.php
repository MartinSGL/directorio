@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>
        Lista de Alumnos
        <a class="btn btn-success float-right btn-sm" href="{{route('admin.alumnos.create')}}">Agregar alumno</a>
    </h1>
    
@stop

@section('content')
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Grado y Grupo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@stop