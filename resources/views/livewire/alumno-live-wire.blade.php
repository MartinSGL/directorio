<div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <div class="px-3 py-3 text-center text-2xl bg-gray-50">
                        <strong>
                            <i>Directorio de alumnos</i>
                        </strong>
                    </div>
                    <hr>
                    {{-- inputs --}}
                    <div class="px-6 py-4 bg-gray-50 md:flex">
                        <x-jet-input type="text" wire:model="search" class="w-full" placeholder="Escriba el nombre o numero para filtrar información" />
                        <select wire:model="salon" class="md:ml-2 md:mt-0 mt-2 w-full md:w-52 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="" selected>Todos los grupos</option>
                            @foreach ($grupos as $grupo)
                                <option value="{{$grupo->id}}">{{$grupo->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- inputs --}}
                    @if ($alumnos->count())
                        {{-- tabla --}}
                        <div class="hidden md:block">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            #
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nombre
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Grupo
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Telefono(s)
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Usaer
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @php $i=1; @endphp
                                    @foreach ($alumnos as $alumno)
                                        <tr class="hover:bg-gray-200 text-xs md:text-sm">
                                            <td class="px-6 py-4">
                                                {{ $i }}
                                            </td>
                                            <td class="px-6 py-4 capitalize text-xs md:text-sm">
                                                {{ $alumno->full_name }} 
                                            </td>
                                            <td class="px-6 py-4 text-xs md:text-sm">
                                                {{ $alumno->grupo->name }}
                                            </td>
                                            <td class="px-6 py-4 text-xs md:text-sm">
                                                <ul>
                                                    <li class="mb-3"><strong>Alumno: </strong>{{ $alumno->numero }} <a target="_blank" href="https://api.whatsapp.com/send?phone=521{{$alumno->numero}}" class="text-white bg-green-500 rounded-full px-1"> <i class="fab fa-whatsapp"></i> </a></li>
                                                    <li><strong>Tutor:&nbsp;&nbsp;&nbsp;&nbsp; </strong>{{ $alumno->numero_tutor }} <a target="_blank" href="https://api.whatsapp.com/send?phone=521{{$alumno->numero_tutor}}" class="text-white bg-green-500 rounded-full px-1"> <i class="fab fa-whatsapp"></i> </a></li>
                                                </ul>
                                            </td>
                                            <td class="px-6 py-4 text-xs md:text-sm">
                                                @if($alumno->usaers->count()>0)
                                                    <i class="fas fa-check text-red-600"></i>
                                                @else
                                                    <i class="fas fa-times"></i>
                                                @endif
                                            </td>
                                        </tr>
                                        @php $i++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{--tabla responsiva--}}
                        <div class="md:hidden block">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            #
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            <div>Nombre</div>
                                            <div>Telefonos(s)</div>
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            <div>Grupo</div>
                                            <div>Usaer</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1; @endphp
                                    @foreach ($alumnos as $alumno)
                                        <tr>
                                            <td rowspan="2" class="px-6 py-4 border-b-2 text-center">
                                                {{ $i }}
                                            </td>
                                            <td class="px-6 py-4 capitalize text-xs md:text-sm text-center">
                                                {{ $alumno->full_name }} 
                                            </td>
                                            <td class="px-6 py-4 text-xs md:text-sm text-center">
                                                {{ $alumno->grupo->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 text-xs md:text-sm border-b-2 text-center">
                                                <ul>
                                                    <li class="mb-3"><strong>Alumno: </strong>{{ $alumno->numero }} <a target="_blank" href="https://api.whatsapp.com/send?phone=521{{$alumno->numero}}" class="text-white bg-green-500 rounded-full px-1"> <i class="fab fa-whatsapp"></i> </a></li>
                                                    <li><strong>Tutor:&nbsp;&nbsp;&nbsp;&nbsp; </strong>{{ $alumno->numero_tutor }} <a target="_blank" href="https://api.whatsapp.com/send?phone=521{{$alumno->numero_tutor}}" class="text-white bg-green-500 rounded-full px-1"> <i class="fab fa-whatsapp"></i> </a></li>
                                                </ul>
                                            </td>
                                            <td class="px-6 py-4 text-xs md:text-sm border-b-2 text-center">
                                                @if($alumno->usaers->count()>0)
                                                    <i class="fas fa-check text-red-600"></i>
                                                @else
                                                    <i class="fas fa-times"></i>
                                                @endif
                                            </td>
                                        </tr>
                                        @php $i++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                       
                        <div class="px-6 py-4">
                            {{$alumnos->links()}}
                        </div>
                        {{-- finaliza tabla --}} 
                    @else
                        <div class="px-6 py-4">
                            No se encontraron registros con los datos proporcionados
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
