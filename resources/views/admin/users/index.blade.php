@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>
        Lista de Usuarios
    </h1>
    
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1; @endphp
                    @foreach ($users as $user)
                        <tr>
                            <th>{{$i}}</th>
                            <th>{{$user->name}}</th>
                            <th>{{$user->email}}</th>
                            <th>{{$user->roles[0]->name}}</th>
                            <th><a href="{{route('admin.users.edit',$user)}}" class="btn btn-info" >Editar</a></th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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

