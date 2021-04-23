@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>
        Editar Alumno
    </h1>
    
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($alumno, ['route'=>['admin.alumnos.update',$alumno],'autocomplete'=>'off','method'=>'put']) !!}
            @include('admin.alumnos.partials.form')
            <div class="form-group">
                {!! Form::submit('Actualizar', ['class'=>'btn btn-info btn-sm']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop