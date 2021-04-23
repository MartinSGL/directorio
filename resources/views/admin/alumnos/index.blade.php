@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>
        Lista de Alumnos
    </h1>
    
@stop

@section('content')
    @livewire('admin.alumno-live-wire')
@stop
