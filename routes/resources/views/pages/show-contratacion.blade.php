<x-app-layout>

    <div class="w-full">

        <div class="imagen-title"
            style="background-image:url(https://www.eltiempo.com/files/article_main/uploads/2021/02/24/60368f9cc9bda.jpeg)">
            <div class="cover pl-[50px]">
                <h1 class="font-extrabold text-my_blue text-3xl">Consejo Terriorial de Autoridades indigenas del Chocó
                </h1>
                <h1 class="text-my_blue text-xl">Contratación</h1>
                <nav class="flex my-4" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center gap-2 text-my_green">
                            <i class="fa-solid fa-house text-my_green"></i>

                            <a href="#"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">

                            </a>
                        </li>
                        <li class="inline-flex items-center">

                            <a href=""
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">

                                fedeurema /
                            </a>
                        </li>

                        <li class="inline-flex items-center">

                            <a href="/nuestros-planes"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">

                                institucional /
                            </a>
                        </li>
                        <li class="inline-flex items-center">

                            <a href="/nuestros-planes"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">

                                Contratación
                            </a>
                        </li>



                    </ol>
                </nav>
            </div>
        </div>

        <div class=" py-8  mx-7 max max-w-8xl ">
            <div class=" max-w-3xl ">
                {!! html_entity_decode($post->extract) !!}
            </div>
            <div class="justify-center flex flex-col md:flex-row items-center">


                <p class="w-full  max-w-[500px] min-w-[400px] md:max-w-[70%] text-lg text-justify m-4 ">

                    @if ($post->archivo)

                    <embed src="{{Storage::url($post->archivo->url)}}" type="application/pdf" width="100%"
                        height="600px" />

                    @endif

                    <a href="{{$post->archivo->url}}">ver</a>
                </p>

                <div>

                </div>
                <div class="flex flex-col w-full  md:w-[30%] justify-center">


                    <div class="w-full flex justify-center flex-col items-center ">
                        <img class="w-full object-cover max-w-[250px]" src="{{asset('images/logo.jpeg') }}" alt="foto">
                        <img class="w-full object-cover max-w-[250px]" src="{{asset('images/contratacion.png') }}"
                            alt="foto">

                    </div>

                    <div class="w-full  flex   flex-col justify-center items-center">
                        <h1> VIGENCIA 2022
                        </h1>
                        @foreach ($posts as $post)

                        <a href={{route('pages.show-contratacion',$post)}} class="text-sm"> {{$post->name}}</a>
                        </a>
                        @endforeach

                    </div>


                </div>
            </div>

        </div>



        <div class="flex justify-center my-12 flex-col gap-3 items-center">
            <h1 class="t text-my_green text-4xl font-semibold"> Consejo Terriorial de Autoridades indigenas del Chocó
            </h1>

            <h2 class="s text-my_red text-2xl">UNIDAD, TERRITORIO, CULTURA Y AUTONOMIA

            </h2>

        </div>

    </div>

</x-app-layout>
