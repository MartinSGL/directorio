<div>
    <ul class="nav nav-tabs ">
        <li class="nav-item">
        <a wire:ignore.self class="nav-link link_ad active">Paso 1 (Seleccionar Alumno)</a>
        </li>
        <li class="nav-item">
        <a wire:ignore.self class="nav-link link_ad">Paso 2 (Seleccionar Discapacidad)</a>
        </li>
    </ul>
    @if($componente_alumno==true && $errors->any()!=1 && $alumno==null)
        <div wire:ignore.self class="card" id="card_alumno">
            <div class="card-header">
                <input wire:model="search"  type="text" class="form-control"  placeholder="Escriba y seleccione el nombre del alumno"/>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($alumnos as $a)
                        <li class="list-group-item">  {{$a->full_name}} - <strong> {{$a->grupo->name}} </strong> 
                            <button type="button" wire:click.debounce.200ms="change_component({{$a->id}})" class="boton_alumno btn btn-info btn-small float-right"> Seleccionar </button>
                        </li>          
                    @endforeach
                </ul>
            </div>
        </div>
    @else
        @if($alumno==null)
        {{--Crear/Create--}}
            {!! Form::open(['route'=>'admin.nee.store','autocomplete'=>'off']) !!}
                <div wire:ignore.self class="card" id="card_discapacidad" style="display: none">
                    <div class="card-header">
                        {!! Form::submit('Guardar', ['class'=>'btn btn-success float-right ml-1']) !!}
                        <div class="row">
                            <input wire:model="search_d" type="text" class="form-control"  placeholder="Escriba y seleccione la(s) discapacidad(es) del alumno"/>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::text('clave', $valor, ['class'=>'d-none']) !!}
                        <ul class="list-group">
                            @error('name')
                                <small class="text-danger mb-1">{{$message}}</small>
                            @enderror
                            @foreach ($discapacidades as $dis)
                            <label class="label" for="{{$dis->name}}">    
                                <li class="list-group-item pointer">  {{$dis->name}}
                                    {!! Form::checkbox('name[]',$dis->id,null ,['class'=>'float-right','id'=>"$dis->name"]) !!}
                                </li>           
                            </label>
                            @endforeach
                        </ul>
                    </div>
                </div>
            {!! Form::close() !!}
        @else
        {{--Editar/Edit--}}
            {!! Form::model($alumno, ['route'=>['admin.nee.update',$alumno],'autocomplete'=>'off', 'method'=>'put']) !!}
                <div wire:ignore.self class="card" id="card_discapacidad" style="display: none">
                    <div class="card-header">
                        {!! Form::submit('Actualizar', ['class'=>'btn btn-info float-right ml-1']) !!}
                        <div class="row">
                            <input wire:model="search_d" type="text" class="form-control"  placeholder="Escriba y seleccione la(s) discapacidad(es) del alumno"/>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @error('usaers')
                                <small class="text-danger mb-1">{{$message}}</small>
                            @enderror
                            @foreach ($discapacidades as $dis)
                            <label class="label" for="{{$dis->name}}">    
                                <li class="list-group-item pointer">  {{$dis->name}}
                                    {!! Form::checkbox('usaers[]',$dis->id,null ,['class'=>'float-right','id'=>"$dis->name"]) !!}
                                </li>           
                            </label>
                            @endforeach
                        </ul>
                    </div>
                </div>
            {!! Form::close() !!} 
        @endif
    @endif
    @section('css')
        <style>
            .pointer:hover{
                cursor: pointer;
            }

            input[type='checkbox'] {
                width:20px;
                height:20px;
            }

        </style>
    @stop
    
    @section('js')
        @if($errors->any() || $alumno!=null)
            <script>
                $('#card_discapacidad').fadeIn(100);
                $('.link_ad').toggleClass('active');
            </script>
        @endif
        <script>
            $('.boton_alumno').click(function(){
                $('#card_alumno').fadeOut(100);
                
                setTimeout(function() {
                    $('.link_ad').toggleClass('active');
                    $('#card_discapacidad').fadeIn(100);
                }, 600);
            });
        </script>
    @stop
</div>
