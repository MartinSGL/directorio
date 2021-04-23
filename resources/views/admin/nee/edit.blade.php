@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>
        Actualizar Alumno NEE
    </h1>
    
@stop

@section('content')
   @livewire('admin.nee-b-a-live-wire', ['alumno' => $alumno])
@stop