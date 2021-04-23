@extends('adminlte::page')

@section('title', 'Administración')

@section('plugins.Chartjs', true)

@section('content_header')
    <h1>Panel de Administración</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Grupos</th>
                                @foreach ($grupos as $grupo)
                                    <td>{{$grupo->name}}</td>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Alumnos</th>
                                @foreach ($grupos as $grupo)
                                    <td>{{$grupo->alumnos->count()}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Alumnos NEE</th>
                                @foreach ($grupos as $grupo)
                                    <td>{{$alumnos_usaer->where('grupo_id',$grupo->id)->count()}}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12">
            <canvas style="overflow:visible;" id="grafica"  height="90"></canvas>
        </div>
    </div>
@stop

@section('js')
    <script>
        let grupos =[];
        let alumnos = [];
        let nees = [];
    </script>
    @foreach ($grupos as $grupo)
        <script>
            var name = "{{$grupo->name}}";
            var alumno = {{$grupo->alumnos->count()}};
            var nee = {{$alumnos_usaer->where('grupo_id',$grupo->id)->count()}};
            grupos.push(name);  alumnos.push(alumno); nees.push(nee)
        </script>
    @endforeach
    <script>
        let grafica = document.getElementById("grafica").getContext('2d');
        let chart = new Chart(grafica,{
            type:"bar",
            data:{
                labels:grupos,
                datasets:[
                    {
                        label:"Alumnos",
                        backgroundColor:"green",
                        data:alumnos
                    },
                    {
                        label:"Alumnos Nee",
                        backgroundColor:"red",
                        data:nees
                    }
                ]
            },
            options:{
                responsive:true,
                layout:{
                    padding: 6
                },
                
            }
        });


    </script>
@stop