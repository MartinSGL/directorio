<div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200">
                    <div class="px-3 py-3 text-center text-2xl bg-gray-50">
                        <strong>
                            <i>Resumen</i>
                        </strong>
                    </div>
                    <hr>
                    {{-- tabla  md --}}
                    <div class="hidden md:block border-b-2">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th width="100px" scope="col"
                                    class="px-6 py-3 text-left font-medium text-gray-500 tracking-wider">
                                    Grupos</th>
                                    @foreach ($grupos as $grupo)
                                        <th>{{$grupo->name}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <th scope="col"
                                    class=" bg-gray-50 px-6 py-3 text-left font-medium text-gray-500 tracking-wider border-r-2">Alumnos</th>
                                    @foreach ($grupos as $grupo)
                                        <td class="px-6 py-4 text-center">{{$grupo->alumnos->count()}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th scope="col"
                                    class="bg-gray-50 px-6 py-3 text-left font-medium text-gray-500 tracking-wider border-r-2">Alumnos NEE</th>
                                    @foreach ($grupos as $grupo)
                                        <td class="px-6 py-4 text-center">{{$alumnos_usaer->where('grupo_id',$grupo->id)->count()}}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{--Table movil--}}
                    <div class="block md:hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th width="70px" scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 tracking-wider">
                                    Grupos</th>
                                    <th width="70px" scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 tracking-wider">
                                    Alumnos</th>
                                    <th width="70px" scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 tracking-wider">
                                    Alumnos NEE</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($grupos as $grupo)
                                    <tr>
                                        <td class="px-6 py-4 text-xs text-center">{{$grupo->name}}</td>
                                        <td class="px-6 py-4 text-xs text-center">{{$grupo->alumnos->count()}}</td>
                                        <td class="px-6 py-4 text-xs text-center">{{$alumnos_usaer->where('grupo_id',$grupo->id)->count()}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mt-2">
        <canvas id="grafica" height="120"></canvas>
    </div>
                

    {{--scripts de graficas--}}
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
</div>
