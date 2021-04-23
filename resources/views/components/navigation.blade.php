<nav class="bg-gray-800" x-data="{open:false}">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        
         <!-- Mobile menu button-->
        <div x-on:click="open = true" class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <!-- Icon when menu is closed. -->
            <!--
              Heroicon name: outline/menu
  
              Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!-- Icon when menu is open. -->
            <!--
              Heroicon name: outline/x
  
              Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <div class="flex-1 flex items-center sm:items-stretch justify-start">
            {{--Logotipo--}}
          <a href="#" class="flex-shrink-0 flex items-center">
            <img class="ml-12 lg:ml-0 block h-8 w-auto" src="{{asset('vendor/adminlte/dist/img/AdminLTELogo.png')}}" alt="ABH">
            <span class="text-white ml-2"><strong>Secundaria</strong> ABH</span> 
          </a>
          <div class="hidden sm:block sm:ml-4 mt-1">
              {{--Menu lg--}}
            <div class="flex space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <div x-data="{id:1}">
                <a href="#" @click="$dispatch('open-url',{id: 1})" class="text-white text-sm font-medium">
                  <span :class="{'bg-gray-900': id==1}" class="w-full px-3 py-2 rounded-md hover:bg-white hover:text-black transition duration-500 ease-in-out" @click="id=1">
                   <i class="fas fa-chart-line fa-fw"></i> <span class="hidden md:inline-flex">Resumen </span> 
                  </span>
                </a>
                <a href="#" @click="$dispatch('open-url',{id: 2})" class="text-white text-sm font-medium">
                  <span :class="{'bg-gray-900': id==2}" class="w-full px-3 py-2 rounded-md hover:bg-white hover:text-black transition duration-500 ease-in-out" @click="id=2">
                    <i class="fas fa-user-graduate fa-fw"></i> <span class="hidden md:inline-flex">Alumnos </span> 
                  </span>
                  </a>
                <a href="#" @click="$dispatch('open-url',{id: 3})" class="text-white text-sm font-medium ">
                  <span :class="{'bg-gray-900': id==3}" class="w-full px-3 py-2 rounded-md hover:bg-white hover:text-black transition duration-500 ease-in-out" @click="id=3">
                    <i class="fas fa-sign-language fa-fw"></i> <span class="hidden md:inline-flex">Usaer </span> 
                  </span>
                </a>
              </div>
            </div>
          </div>
        </div>
        
            
        @auth
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          {{--Boton notificación--}}
            <button class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
          </button>
  
          <!-- Profile dropdown -->
          <div class="ml-3 relative" x-data="{open:false}">
            <div>
              
              <button x-on:click="open = true" class="px-1 bg-gray-800 flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">
                <span class="mr-2 text-white hidden md:block">{{auth()->user()->name}}</span>
                <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="">
                
              </button>
            </div>
            <!--
              Profile dropdown panel, show/hide based on dropdown state.
  
              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
            <div x-show.transition="open" x-on:click.away.transition="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
              {{--<a href="{{route('profile.show')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Tu perfil</a>--}}
              @can('admin.home')
                <a href="{{route('admin.home')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                  <i class="fas fa-edit fa-fw"></i> Administración</a>  
              @endcan
              <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" onclick="event.preventDefault();
                    this.closest('form').submit();">
                    <i class="fa fa-fw fa-power-off"></i> Salir</a>
              </form>
            </div>
          </div>
        </div>
        @endauth
        

      </div>
    </div>
  
    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu" x-show.transition="open"  x-on:click.away="open = false">
      <div class="px-2 pt-2 pb-3 space-y-1" x-data="{id:1}">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="#"  @click="$dispatch('open-url',{id: 1})" :class="{'bg-gray-900': id==1}" class="text-white block rounded-md text-base font-medium hover:bg-white hover:text-black transition duration-500 ease-in-out">
          <span class="w-full block px-3 py-2" @click="id=1">
            <i class="fas fa-chart-line fa-fw mr-1"></i>Resumen</span>
        </a>
        <a href="#"  @click="$dispatch('open-url',{id: 2})" :class="{'bg-gray-900': id==2}" class="text-white block rounded-md text-base font-medium hover:bg-white hover:text-black transition duration-500 ease-in-out">
          <span class="w-full block px-3 py-2" @click="id=2">
            <i class="fas fa-user-graduate fa-fw mr-1"></i>Alumnos</span>
        </a>
        <a href="#"  @click="$dispatch('open-url',{id: 3})" :class="{'bg-gray-900': id==3}" class="text-white block rounded-md text-base font-medium hover:bg-white hover:text-black transition duration-500 ease-in-out">
          <span class="w-full block px-3 py-2 " @click="id=3">
            <i class="fas fa-sign-language fa-fw mr-1"></i>Usaer</span>
        </a>
      </div>
    </div>
  </nav>



