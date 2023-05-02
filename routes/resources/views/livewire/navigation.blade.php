<header class="borde border-b-[1px] border-gray-200">

    <div class="bg-light_blue  ">
        <div class="max-w-7xl my-0 mx-auto flex justify-between items-center">
            <div class="text-white flex gap-2 items-center">
                {{$fecha_actual->format('Y-m-d')}} : {{$fecha_formateada}}
            </div>
            @auth
            <div class="flex items-center order-3 text-black relative" x-data="{open:false}">
                <button type="button" x-on:click="open=true" id="mega-menu-icons-dropdown-button3"
                    id="mega-menu-icons-dropdown-button3" data-dropdown-toggle="mega-menu-icons-dropdown3"
                    class="flex mr-3 text-sm  rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="{{auth()->user()->profile_photo_url}}" alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div {{-- x-show="open" x-on:click.away="open=false" x-on:click="openDesple=true" --}}
                    id="mega-menu-icons-dropdown3" class="z-50 absolute hidden ">
                    <div aria-labelledby="mega-menu-icons-dropdown-button3"
                        class="z-50 absolute  my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow  top-[-30px] right-[0px]">
                        <div class="px-4 py-3 ">
                            <span class="block text-sm text-gray-900 "> {{auth()->user()->name}}</span>
                            <span
                                class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{auth()->user()->email}}</span>
                        </div>

                        <ul class="py-1">

                            @can('admin.index')
                            <li>

                                <a href="{{route('admin.index')}}"
                                    class="block px-4 py-2 text-sm text-gray-700 rounded-md hover:bg-light_green  hover:text-white font-medium">Dashboard</a>
                            </li>
                            @endcan

                            <li>
                                <a href="{{route('profile.show')}}"
                                    class="block px-4 py-2 text-sm text-gray-700 rounded-md hover:bg-light_green  hover:text-white font-medium ">Configuración</a>
                            </li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf


                                    <a href="{{ route('logout') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 rounded-md hover:bg-light_red  hover:text-white font-medium "
                                        @click.prevent="$root.submit();">Cerrar session</a>
                                </form>

                            </li>

                        </ul>
                    </div>
                </div>

            </div>
            @else


            <div class="flex gap-2  order-3 items-center cursor-pointer text-white text-[14px] flex-col md:flex-row">
                <a href="{{route('login')}}" class="text-white">Inicia sessión</a>
                <span class="hidden md:block">| </span>

                <a href="{{route('register')}}" class="text-white">
                    Registrarse
                </a>

            </div>

            @endauth
        </div>

    </div>
    {{--
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-1 rounded text-white " x-data="{openMenu:false}">
        <div
            class="container flex flex-wrap items-center justify-between md:justify-center lg:justify-between mx-auto my-0 max-w-7xl ">
            <div class="flex items-center gap-2">
                <a href="https://www.quibdo-choco.gov.co/Paginas/default.aspx" target="_blank" rel="noopener noreferrer"
                    class="flex">
                    <img src=" {{ asset('images/logo.jpeg') }} " class=" w-[60px]">
                    <div class="flex flex-col text-black">

                </a>
                <a href="/" class="flex flex-col">
                    <strong class="text-[15x]">Consejo Terriorial de</strong>
                    <strong class="text-[15px]">Autoridades indigenas del Chocó</strong>
                </a>

            </div>
        </div>

        <div class="flex md:order-2">

            <div class="relative hidden md:block md:my-0 md:mx-auto">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                    x-on:click="openMenu=true">
                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Search icon</span>
                </div>

                <form action="{{route('posts.search')}}" method="GET" class="d-flex">
                    <input type="text" id="search-navbar" autocomplete="off" name="search"
                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-light_green focus:border-light_green   dark:placeholder-gray-400 "
                        placeholder="Buscar..." value="{{request('search')}}">
                </form>




            </div>
            <button type="button" x-on:click="openMenu=true"
                class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 ">
                <span class=" sr-only">Open menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div x-show="openMenu" x-on:click.away="openMenu=false"
            class="items-center justify-between  w-full md:flex md:w-auto md:order-1" id="navbar-search">
            <div class="relative mt-3 md:hidden">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="search-navbar" autocomplete="off"
                    class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-light_green    dark:focus:ring-light_green "
                    placeholder="Buscar...">
            </div>
            <ul
                class="flex flex-col   p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0  md:font-medium md:border-0 md:bg-white   dark:border-gray-700">

                <li>
                    <a href="/"
                        class="block py-2 pl-3 pr-4 text-gray-700
                             rounded md:hover:bg-transparent hover:text-light_green md:p-0 {{request()->routeIs('pages.index') ? 'font-bold text-light_green' : '' }}">Inicio</a>
                </li>
                <li x-data="{openDesple:false}" class="relative">
                    <div x-on:click="openDesple=true"
                        class=" py-2 pl-3 pr-4 flex cursor-pointer items-center hover:font-medium  text-gray-700 rounded  md:hover:bg-transparent hover:text-light_green md:p-0  ">
                        Institucional

                        <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div x-show="openDesple" x-on:click.away="openDesple=false"
                        class="z-40  font-normal bg-white divide-y absolute divide-gray-100 rounded shadow w-44 ">
                        <ul class="py-1 text-sm text-gray-700">

                            <li>
                                <a href={{route('pages.mision')}}
                                    class="block px-4 py-2 hover:bg-light_green hover:text-white rounded-md">Misión
                                </a>
                            </li>
                            <li>
                                <a href="{{route('pages.vision')}}"
                                    class="block px-4 py-2 hover:bg-light_green hover:text-white rounded-md">
                                    Visión
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{route('pages.educacion')}}"
                        class="{{request()->routeIs('pages.educacion') ? 'font-bold text-light_green' : '' }} block py-2 pl-3 pr-4  rounded  md:hover:bg-transparent hover:text-light_green md:p-0 hover:font-medium text-gray-700">Programas</a>
                </li>

                <li x-data="{openDesple:false}" class="relative">
                    <div x-on:click="openDesple=true"
                        class=" py-2 pl-3 pr-4 flex cursor-pointer items-center hover:font-medium  text-gray-700 rounded  md:hover:bg-transparent hover:text-light_green md:p-0  ">
                        Administrativos

                        <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div x-show="openDesple" x-on:click.away="openDesple=false"
                        class="z-40  font-normal bg-white divide-y absolute divide-gray-100 rounded shadow w-44 ">
                        <ul class="py-1 text-sm text-gray-700">


                            <li>
                                <a href="{{route('pages.contratacion')}}"
                                    class="block px-4 py-2 hover:bg-light_green hover:text-white rounded-md">
                                    Contratación
                                </a>
                            </li>
                            <li>
                                <a href={{route('pages.convocatoria')}}
                                    class="block px-4 py-2 hover:bg-light_green hover:text-white rounded-md">Convocatoria
                                </a>
                            </li>



                        </ul>
                    </div>



                </li>

                <li>
                    <a href="{{route('pages.comunicacion')}}"
                        class="{{request()->routeIs('pages.comunicacion') ? 'font-bold text-light_green' : '' }} block py-2 pl-3 pr-4  rounded  md:hover:bg-transparent hover:text-light_green md:p-0 hover:font-medium text-gray-700">Comunicación</a>
                </li>
                <li>
                    <a href="{{route('pages.contactanos')}}"
                        class="{{request()->routeIs('pages.contactanos') ? 'font-bold text-light_green' : '' }} block py-2 pl-3 pr-4  rounded  md:hover:bg-transparent hover:text-light_green md:p-0 hover:font-medium text-gray-700">Contactanos</a>
                </li>
            </ul>
        </div>


        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
            <ul
                class="flex flex-col   p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0  md:font-medium md:border-0 md:bg-white   dark:border-gray-700">
                <li>
                    <a href="/"
                        class="block py-2 pl-3 pr-4 text-gray-700
                             rounded md:hover:bg-transparent hover:text-light_green md:p-0 {{request()->routeIs('pages.index') ? 'font-bold text-light_green' : '' }}">Inicio</a>
                </li>
                <li x-data="{openDesple:false}" class="relative">
                    <div x-on:click="openDesple=true"
                        class=" py-2 pl-3 pr-4 flex cursor-pointer items-center hover:font-medium  text-gray-700 rounded  md:hover:bg-transparent hover:text-light_green md:p-0  ">
                        Institucional

                        <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div x-show="openDesple" x-on:click.away="openDesple=false"
                        class="z-40  font-normal bg-white divide-y absolute divide-gray-100 rounded shadow w-44 ">
                        <ul class="py-1 text-sm text-gray-700">

                            <li>
                                <a href={{route('pages.mision')}}
                                    class="block px-4 py-2 hover:bg-light_green hover:text-white rounded-md">Misión
                                </a>
                            </li>
                            <li>
                                <a href="{{route('pages.vision')}}"
                                    class="block px-4 py-2 hover:bg-light_green hover:text-white rounded-md">
                                    Visión
                                </a>
                            </li>


                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{route('pages.educacion')}}"
                        class="{{request()->routeIs('pages.educacion') ? 'font-bold text-light_green' : '' }} block py-2 pl-3 pr-4  rounded  md:hover:bg-transparent hover:text-light_green md:p-0 hover:font-medium text-gray-700">Programas</a>
                </li>

                <li x-data="{openDesple:false}" class="relative">
                    <div x-on:click="openDesple=true"
                        class=" py-2 pl-3 pr-4 flex cursor-pointer items-center hover:font-medium  text-gray-700 rounded  md:hover:bg-transparent hover:text-light_green md:p-0  ">
                        Administrativos

                        <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div x-show="openDesple" x-on:click.away="openDesple=false"
                        class="z-40  font-normal bg-white divide-y absolute divide-gray-100 rounded shadow w-44 ">
                        <ul class="py-1 text-sm text-gray-700">


                            <li>
                                <a href="{{route('pages.contratacion')}}"
                                    class="block px-4 py-2 hover:bg-light_green hover:text-white rounded-md">
                                    Contratación
                                </a>
                            </li>
                            <li>
                                <a href={{route('pages.convocatoria')}}
                                    class="block px-4 py-2 hover:bg-light_green hover:text-white rounded-md">Convocatoria
                                </a>
                            </li>



                        </ul>
                    </div>



                </li>

                <li>
                    <a href="{{route('pages.comunicacion')}}"
                        class="{{request()->routeIs('pages.comunicacion') ? 'font-bold text-light_green' : '' }} block py-2 pl-3 pr-4  rounded  md:hover:bg-transparent hover:text-light_green md:p-0 hover:font-medium text-gray-700">Comunicación</a>
                </li>
                <li>
                    <a href="{{route('pages.contactanos')}}"
                        class="{{request()->routeIs('pages.contactanos') ? 'font-bold text-light_green' : '' }} block py-2 pl-3 pr-4  rounded  md:hover:bg-transparent hover:text-light_green md:p-0 hover:font-medium text-gray-700">Contactanos</a>
                </li>
            </ul>
        </div>
        </div>
    </nav> --}}

    {{-- otro --}}


    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-1 rounded text-white ">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl  mx-auto p-2">
            <div
                class="container flex flex-wrap items-center justify-between md:justify-center lg:justify-between mx-auto my-0 max-w-7xl ">
                <div class="flex items-center gap-2">
                    <a href="/" target="_blank" rel="noopener noreferrer" class="flex">
                        <img src=" {{ asset('images/logo.jpeg') }} " class=" w-[60px]">
                        <div class="flex flex-col text-black">

                    </a>
                    <a href="/" class="flex flex-col">
                        <strong class="text-[15x]">Consejo Terriorial de</strong>
                        <strong class="text-[15px]">Autoridades indigenas del Chocó</strong>
                    </a>

                </div>

            </div>
            <div class="flex items-center md:order-2 ">
                <div class="relative  md:my-0 md:mx-auto">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                        x-on:click="openMenu=true">
                        <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Search icon</span>
                    </div>

                    <form action="{{route('posts.search')}}" method="GET" class="d-flex">
                        <input type="text" id="search-navbar" autocomplete="off" name="search"
                            class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-light_green focus:border-light_green   dark:placeholder-gray-400 "
                            placeholder="Buscar..." value="{{request('search')}}">
                    </form>




                </div>
                <button data-collapse-toggle="mega-menu-icons" type="button"
                    class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="mega-menu-icons" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div id="mega-menu-icons" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                <ul class="flex flex-col  mt-4 font-medium md:flex-row md:space-x-8 md:mt-0">

                    <li>
                        <a href="/"
                            class="block py-2 pl-3 pr-4 text-gray-700
                                 rounded md:hover:bg-transparent hover:text-light_green md:p-0 {{request()->routeIs('pages.index') ? 'font-bold text-light_green' : '' }}">Inicio</a>
                    </li>
                    <li class="relative">
                        <div id="mega-menu-icons-dropdown-button" data-dropdown-toggle="mega-menu-icons-dropdown"
                            class=" py-2 pl-3 pr-4 flex cursor-pointer items-center hover:font-medium  text-gray-700 rounded  md:hover:bg-transparent hover:text-light_green md:p-0  ">
                            Institucional

                            <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div x-show="openDesple" id="mega-menu-icons-dropdown"
                            class="z-40  font-normal hidden bg-white divide-y absolute divide-gray-100 rounded shadow w-44 ">
                            <ul class="py-1 text-sm text-gray-700  " aria-labelledby="mega-menu-icons-dropdown-button">

                                <li>
                                    <a href={{route('pages.mision')}}
                                        class="block px-4 py-2 hover:bg-light_green hover:text-white rounded-md">Misión
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('pages.vision')}}"
                                        class="block px-4 py-2 hover:bg-light_green hover:text-white rounded-md">
                                        Visión
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="{{route('pages.educacion')}}"
                            class="{{request()->routeIs('pages.educacion') ? 'font-bold text-light_green' : '' }} block py-2 pl-3 pr-4  rounded  md:hover:bg-transparent hover:text-light_green md:p-0 hover:font-medium text-gray-700">Programas</a>
                    </li>

                    <li {{-- x-data="{openDesple:false}" --}} class="relative">
                        <div x-on:click="openDesple=true" id="mega-menu-icons-dropdown-button2"
                            data-dropdown-toggle="mega-menu-icons-dropdown2"
                            class=" py-2 pl-3 pr-4 flex cursor-pointer items-center hover:font-medium  text-gray-700 rounded  md:hover:bg-transparent hover:text-light_green md:p-0  ">
                            Administrativos

                            <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div {{-- x-show="openDesple" x-on:click.away="openDesple=false" --}}
                            id="mega-menu-icons-dropdown2"
                            class="z-50 hidden  font-normal bg-white divide-y absolute divide-gray-100 rounded shadow w-44 ">
                            <ul class="py-1 text-sm text-gray-700  " aria-labelledby="mega-menu-icons-dropdown-button2">


                                <li>
                                    <a href="{{route('pages.contratacion')}}"
                                        class="block px-4 py-2 hover:bg-light_green hover:text-white rounded-md">
                                        Contratación
                                    </a>
                                </li>
                                <li>
                                    <a href={{route('pages.convocatoria')}}
                                        class="block px-4 py-2 hover:bg-light_green hover:text-white rounded-md">Convocatoria
                                    </a>
                                </li>



                            </ul>
                        </div>



                    </li>

                    <li>
                        <a href="{{route('pages.comunicacion')}}"
                            class="{{request()->routeIs('pages.comunicacion') ? 'font-bold text-light_green' : '' }} block py-2 pl-3 pr-4  rounded  md:hover:bg-transparent hover:text-light_green md:p-0 hover:font-medium text-gray-700">Comunicación</a>
                    </li>
                    <li>
                        <a href="{{route('pages.contactanos')}}"
                            class="{{request()->routeIs('pages.contactanos') ? 'font-bold text-light_green' : '' }} block py-2 pl-3 pr-4  rounded  md:hover:bg-transparent hover:text-light_green md:p-0 hover:font-medium text-gray-700">Contactanos</a>
                    </li>



                </ul>
            </div>
        </div>
    </nav>


</header>