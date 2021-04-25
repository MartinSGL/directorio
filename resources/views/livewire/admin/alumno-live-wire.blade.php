<div>
    @section('content_header')
        <h2>Lista de alumnos</h2>
    @stop
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.alumnos.create')}}" class="btn btn-success ml-1  float-right">Agregar</a>
            <select wire:model="grupoS" class="float-right form-control ml-1 " style="width: 200px;">
                <option value="" selected>Seleccione un grupo</option>
                @foreach ($grupos as $grupo)
                    <option value="{{$grupo->id}}">{{$grupo->name}}</option>
                @endforeach
            </select>
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
                            <th width='15%'>Grupo</th>
                            <th width='20%'>Telefono(s)</th>
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
                                    <li><strong>Alumno: </strong>{{$alumno->numero}}</li>
                                    <li><strong>Tutor: </strong>{{$alumno->numero_tutor}}</li>
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm m-1" href="{{ route('admin.alumnos.edit', $alumno) }}" >Editar</a>
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
                            <h5>¿ Esta seguro de eliminar <strong>{{$alumno_eliminar['apaterno']}} {{$alumno_eliminar['amaterno']}} {{$alumno_eliminar['name']}} ?</strong></h5>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                   <form action="{{ route('admin.alumnos.destroy', $alumno_eliminar['id']) }}" method="POST">
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
