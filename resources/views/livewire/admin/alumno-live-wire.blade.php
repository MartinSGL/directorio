<div>
    @section('content_header')
        <h2>Lista de alumnos</h2>
    @stop

    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.alumnos.create')}}" class="btn btn-success ml-1 float-right">Agregar</a>
            <div class="row">
                <input wire:model="search" type="text" class="form-control" placeholder="Escriba el nombre del alumno realizar su busqueda">                
            </div>
        </div>
        <div class="card-body">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Grado y Grupo</th>
                        <th>Telefono(s)</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    @section('css')
    <link rel="stylesheet" href="{{asset('vendor/alertifyjs/css/alertify.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/alertifyjs/css/themes/default.min.css')}}"/>
    @stop

    @section('js')
        <script src="{{asset('vendor/alertifyjs/alertify.min.js')}}"></script>
    @stop
</div>
