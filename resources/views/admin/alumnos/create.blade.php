@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>
        Agregar Alumno
    </h1>
    
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.alumnos.store','autocomplete'=>'off','id'=>'form']) !!}
            @include('admin.alumnos.partials.form')
            <div class="form-group">
                {!! Form::submit('Guardar', ['class'=>'btn btn-success btn-sm']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
