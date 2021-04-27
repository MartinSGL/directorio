<div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">                        
                    <div class="px-3 py-3 text-center text-2xl bg-gray-50">
                        <strong>
                            <i>Listado de alumnos NEE</i>
                        </strong>
                    </div>
                    <hr>
                    {{-- inputs --}}
                    <div class="px-6 py-4 bg-gray-50 md:flex">
                        <x-jet-input type="text" wire:model="search" class="w-full" placeholder="Escriba el nombre del alumno" />
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
                                            Discapacidades
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
                                                    @foreach ($alumno->usaers as $al)
                                                        <li>{{$al->name}} <button wire:click="getInfo({{$al->id}})" class="bg-gray-400 px-2 py-1 text-white hover:bg-blue-200 rounded-full"><i class="far fa-question-circle"></i></button></li>
                                                    @endforeach
                                                </ul>
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
                                            <div>#</div>
                                            <div>Grupo</div>                                        
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            <div>Nombre</div>
                                            <div>Discapacidad</div>
                                        </th>
                                    </tr>  
                                </thead>
                                <tbody class="bg-white">
                                    @php $i=1; @endphp
                                    @foreach ($alumnos as $alumno)
                                        <tr>
                                            <td class="px-6 py-4 text-center">
                                                {{ $i }}
                                            </td>
                                            <td class="px-6 py-4 capitalize text-xs md:text-sm text-center">
                                                {{ $alumno->full_name }} 
                                            </td>
                                        </tr>
                                        <tr class="border-b-2">
                                            <td class="px-6 py-4 text-xs md:text-sm text-center">
                                                {{ $alumno->grupo->name }}
                                            </td>
                                            <td class="px-6 py-4 text-xs md:text-sm text-center">
                                                <ul>
                                                    @foreach ($alumno->usaers as $al)
                                                        <li>{{$al->name}} <button wire:click="getInfo({{$al->id}})" class="bg-gray-400 px-2 py-1 text-white hover:bg-blue-200 rounded-full"><i class="far fa-question-circle"></i></button></li>
                                                    @endforeach
                                                </ul>
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

    <x-jet-dialog-modal wire:model="open" wire:click.away="init()">
        <x-slot name="title">
            <div class="border-b-2">
            {{$name}}
            </div>
        </x-slot>
        <x-slot name="content">
            {{$body}}
        </x-slot>
        <x-slot name="footer">
            <button wire:click="init()" class="bg-red-700 rounded text-white py-1 px-3 hover:bg-red-200">Cerrar</button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
