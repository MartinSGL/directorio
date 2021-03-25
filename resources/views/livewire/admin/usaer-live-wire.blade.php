<div>
    @section('content_header')
        <h2>Lista de discapacidades</h2>
    @stop
    <div class="card">
        <div class="card-header">
            <a href="#" wire:click="resetM()" data-toggle="modal" data-target="#modal_agregar" class="btn btn-success ml-1 float-right">Agregar</a>
            <div class="row">
                <input wire:model="search" type="text" class="form-control" placeholder="Escriba el nombre o la descripción para buscar una discapacidad">                
            </div>
        </div>
        @if($usaers->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="15%">Nombre</th>
                            <th width="62%">Descripción</th>
                            <th width="18%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach ($usaers as $usaer)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$usaer->name}}</td>
                                <td>{{$usaer->body}}</td>
                                <td>
                                    <a href="#" data-turbolinks="false" wire:click="edit({{$usaer}})" data-toggle="modal" data-target="#modal_editar" class="btn btn-info btn-sm m-1">Editar</a>
                                    <a href="#" data-turbolinks="false" wire:click="delete({{$usaer}})" data-toggle="modal" data-target="#modal_eliminar" class="btn btn-danger btn-sm m-1">Eliminar</a>
                                </td>
                            </tr>
                            @php $i++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$usaers->links()}}
            </div>
        @else
            <div class="card-footer">
               <h5>No se han encontrado registros con los datos proporcionados</h5>
            </div>
        @endif
    </div>

    {{--Componentes modal--}}
    <x-admin.usaers.m_agregar/>
    <x-admin.usaers.m_editar name="{{$name}}" body="{{$body}}" usaerId="{{$usaer_id}}"/>
    <x-admin.usaers.m_eliminar name="{{$name}}" usaerId="{{$usaer_id}}"/>

    @section('css')
        <link rel="stylesheet" href="{{asset('vendor/alertifyjs/css/alertify.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('vendor/alertifyjs/css/themes/default.min.css')}}"/>
    @stop

    @section('js')
        <script src="{{asset('vendor/alertifyjs/alertify.min.js')}}"></script>
        <script>
            Livewire.on('confirm', mensaje => {
                $('#modal_agregar').modal('hide');
                $('#modal_editar').modal('hide');
                $('#modal_eliminar').modal('hide');
                alertify.success(mensaje);
            });
        </script>
    @stop
</div>
