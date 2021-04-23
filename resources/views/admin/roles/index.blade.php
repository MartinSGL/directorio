@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>
        Lista de Roles y Permisos
    </h1>
    
@stop

@section('content')
    <div class="card">
        {!! Form::open(['route'=>'admin.roles.store','autocomplete'=>'off']) !!}
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td width="40%"></td>
                        @foreach ($roles as $role)
                            <th scope="col" width="15%">{{$role->name}}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permisos as $permiso)
                    <tr>
                        <th scope="row">{{$permiso->description}}</th>    
                        @foreach ($roles as $role)
                            <td>
                                {!! Form::checkbox($role->name.'[]', $permiso->id, $role->hasPermissionTo($permiso->name),['class'=>'permisos-roles']) !!}
                            </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {!! Form::submit('Guardar', ['Class'=>'btn btn-success mt-2']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('vendor/alertifyjs/css/alertify.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/alertifyjs/css/themes/default.min.css')}}"/>
@stop

@section('js')
    @if(session('info'))
        <script>
            let mensaje = "{{session('info')}}";
        </script>
        {{Session::forget('info')}}     
    @else
        <script>
            let mensaje = "";
        </script>
    @endif
        <script src="{{asset('vendor/alertifyjs/alertify.min.js')}}"></script>
    <script>
        if(mensaje!=''){ alertify.success(mensaje);}
    </script>
@endsection
