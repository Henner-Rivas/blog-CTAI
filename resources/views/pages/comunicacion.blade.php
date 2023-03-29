<x-app-layout>
    <div class="min-h-screen">
        <div class="imagen-title2 "
            style="background-image:url(http://alianzaagroecologia.redelivre.org.br/files/2016/08/Dia-Internacional-dos-Povos-Indigenas.jpg)">
            <div class="cover pl-[50px]">
                <h1 class="font-extrabold text-my_blue text-3xl">Consejo Terriorial de Autoridades indigenas del Chocó
                </h1>

                <h1 class="text-my_blue text-bold text-1xl font-medium">Comunicación</h1>


                <nav class="flex my-4" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center gap-2">
                            <i class="fa-solid fa-house"></i> <a href="#"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">


                            </a>
                        </li>
                        <li class="inline-flex items-center">

                            <a href=""
                                class="inline-flex items-center text-sm font-medium text-white hover:text-blue-600">

                                fedeurema /
                            </a>
                        </li>

                        <li class="inline-flex items-center">

                            <a href="/comunicacion"
                                class="inline-flex items-center text-sm font-medium text-white hover:text-blue-600">

                                Comuniciación
                            </a>
                        </li>




                    </ol>


                </nav>
            </div>


        </div>

        <div class="container py-8 my-0 mx-auto max-w-6xl  ">
            <h1 class="text-2xl font-medium mb-4">Comuniciación</h1>


            <div class="flex  flex-col gap-4">

                @foreach ($posts as $post)

                <div
                    class="p-6 text-white border relative border-gray-200 rounded-lg shadow  w-full h-[15rem] flex justify-center items-center flex-col bg-slate-500">
                    <div class=" absolute top-0 left-0  bg-white p-2 rounded-l-md">
                        <i class="fa-regular fa-calendar text-my_green"></i>
                        <span class="text-black ">{{$post->created_at}}</span>
                    </div>

                    <a href="{{route('pages.show-comunicacion',$post)}}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight  "> {{$post->name}}
                        </h5>
                    </a>
                    <a href="{{route('pages.show-comunicacion',$post)}}" class="mb-3 font-normal ">
                        {!! html_entity_decode(Str::limit($post->extract, 90, '...')) !!}

                    </a>

                </div>
                @endforeach

            </div>
            <div>

                {{$posts->links()}}
            </div>
        </div>
    </div>
</x-app-layout>