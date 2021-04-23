@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>
        Editar Rol de Usuarios
    </h1>
    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>{{$user->name}}</h5>
        </div>
        <div class="card-body">
            <h6><strong>Roles<strong></h6>
            {!! Form::model($user, ['route'=>['admin.users.update',$user],'autocomplete'=>'off','method'=>'put']) !!}
                @foreach ($roles as $role)
                    <div class="form-check">
                        {!! Form::radio('role', $role->id, $user->roles[0]->name == $role->name ? true :false, ['class'=>'form-check-input','id'=>$role->id]) !!}
                        {!! Form::label($role->id,  $role->name, ['class'=>'form-check-label']) !!}
                    </div>
                @endforeach
                {!! Form::submit('Actualizar', ['class'=>'btn btn-info btn-sm mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .form-check-label:hover,.form-check-input:hover{
            cursor: pointer;
        }
    </style>
@endsection