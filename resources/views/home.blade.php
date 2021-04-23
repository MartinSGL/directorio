<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                 <div x-data="{ open: true }" x-show.transition="open" @open-url.window="if($event.detail.id==1){open=true}else{open=false}">
                    @livewire('resumen-live-wire')
                 </div>
                 <div x-data="{ open: false }" x-show.transition="open" @open-url.window="if($event.detail.id==2){open=true}else{open=false}">
                    @livewire('alumno-live-wire')
                 </div>
                 <div x-data="{ open: false }" x-show.transition="open" @open-url.window="if($event.detail.id==3){open=true}else{open=false}">
                       @livewire('usaer-live-wire')
                 </div>
              </div>
        </div>
     </div>
</x-app-layout>