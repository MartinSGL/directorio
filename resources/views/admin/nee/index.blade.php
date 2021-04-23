@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>
        Lista de Alumnos NEE
    </h1>
    
@stop

@section('content')
    @livewire('admin.nee-live-wire')
@stop
