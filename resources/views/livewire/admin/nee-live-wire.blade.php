<div>
    @section('content_header')
        <h2>Lista de alumnos</h2>
    @stop
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.nee.create')}}" class="btn btn-success ml-1  float-right">Agregar</a>
            <div class="row">
                <input wire:model="search" type="text" class="form-control" placeholder="Escriba el nombre del alumno iniciando por apellidos">                
            </div>
        </div>
        @if($alumnos->count())
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width='35%'>Nombre</th>
                            <th width='10%'>Grupo</th>
                            <th width='30%'>Discapacidades</th>
                            <th width='20%'>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach ($alumnos as $alumno)
                           
                            <tr>
                                <td>{{$i}}</td>
                                <td class="text-capitalize">{{$alumno->full_name}}</td>
                                <td>{{$alumno->grupo->name}}</td>
                                <td>
                                    @foreach ($alumno->usaers as $al)
                                        <li>{{$al->name}}</li>
                                    @endforeach
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm m-1" href="{{ route('admin.nee.edit', $alumno) }}" >Editar</a>
                                    <button wire:click="destroy({{$alumno}})" class="btn btn-danger btn-sm m-1">Eliminar</button>
                                </td>
                            </tr>
                            @php $i++; @endphp
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$alumnos->links()}}
            </div>
        @else
            <div class="card-footer">
                <h5>No se han encontrado registros con los datos proporcionados</h5>
            </div>
        @endif
        
        {{--Modal eliminar--}}
        <div wire:ignore.self class="modal fade" id="modal_eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Eliminar alumno</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">  
                            <h5>¿ Esta seguro de eliminar <strong> {{$nee_eliminar['apaterno']}} {{$nee_eliminar['amaterno']}} {{$nee_eliminar['name']}}</strong> como alumno <strong> NEE </strong> ? </h5>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                   <form action="{{ route('admin.nee.destroy', $nee_eliminar['id']) }}" method="POST">
                        @csrf
                        @method('delete')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
            </div>
          </div>
        </div>

    </div>
    @section('css')
    <link rel="stylesheet" href="{{asset('vendor/alertifyjs/css/alertify.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/alertifyjs/css/themes/default.min.css')}}"/>
    @stop

    @section('js')
        @if(session('info'))
            <script>
                let mensaje = "{{session('info')}}";
            </script>
            {{ Session::forget('info') }}     
        @else
            <script>
                let mensaje = "";
            </script>
        @endif
        <script src="{{asset('vendor/alertifyjs/alertify.min.js')}}"></script>
        <script>
           
            if(mensaje!=''){ alertify.success(mensaje);}

            Livewire.on('modal_open', mensaje => {
                $('#modal_eliminar').modal('show');
            });

        </script>
        
    @stop
</div>
