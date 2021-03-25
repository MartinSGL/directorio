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
            {!! Form::open(['route'=>'admin.alumnos.store']) !!}
                <div class="form-group">
                    {!! Form::label('apaterno', 'Apellido paterno') !!}
                    {!! Form::text('apaterno', null, ['class'=>'form-control','placeholder'=>'Garcia','autocomplete'=>'off']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('amaterno', 'Apellido materno') !!}
                    {!! Form::text('amaterno', null, ['class'=>'form-control','placeholder'=>'Robles','autocomplete'=>'off']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Nombre completo') !!}
                    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Maria Fernanda','autocomplete'=>'off']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('grupo_id', 'Grado y grupo') !!}
                    {!! Form::select('grupo_id', $grupos, null, ['class'=>'form-control','placeholder'=>'seleccione un grado y grupo']) !!}  
                </div>
                <div class="form-group">
                    {!! Form::label('usaer', 'Usaer') !!}<br>
                        <label for="usaer" class="mr-2">
                            No
                        {!! Form::radio('usaer', 0, true) !!}
                        </label>
                        <label for="usaer" class="mr-2">
                            Si
                        {!! Form::radio('usaer', 1) !!}
                        </label>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop