<x-app-layout>

    @include('components/slider-home')


    <div class="max-w-7xl  mx-auto flex-col flex gap-4 my-5 ">

        <div class="flex gap-5 justify-center flex-wrap">

            <a href={{ route('pages.comunicacion') }}>

                <img src="{{ Vite::asset('resources/images/142.png') }}" alt="">

            </a>
            <a href="">
                <img src="{{ Vite::asset('resources/images/biblioteca250.png') }} " alt="">

            </a>
            <a href="">

                <img src="{{ Vite::asset('resources/images/programa250.png') }}" alt="">
            </a>
            <a href={{ route('pages.comunicacion') }}>

                <img src="{{ Vite::asset('resources/images/noticia250.png') }}" alt="">
            </a>


        </div>


        <div class="grid grid-cols-1 md:grid-cols-2  justify-between max-w-5xl my-0 mx-auto ">

            <div class="flex  flex-col items-center">

                <p class="text-4xl  text-justify">
                    <strong>Bienvenidos </strong> , somos una federación de asociaciones de cabildos indígenas sin ánimo
                    de
                    lucro.
                </p>

                <div>
                    <img class="max-w-[300px]" src="{{ Vite::asset('resources/images/logo.jpeg') }}" alt="">
                </div>

                <p>Que se constituyó el 11 de noviembre del 2009 ante la cámara de comercio, con su sede principal en la
                    ciudad de Quibdó, Departamento del chocó en el pacífico colombiano

                </p>
            </div>

            <div class=" text-right  flex flex-col gap-6">
                <div class="">
                    <span class="text-7xl font-extrabold text-my_green"> 10</span>
                    <p class="text-lg"> Asociaciones de Cabildos
                    </p>
                </div>

                <div class="">
                    <span class="text-7xl font-extrabold text-my_green"> 65</span>
                    <p class="text-lg"> Comunidades
                    </p>
                </div>
                <div class="">
                    <span class="text-7xl font-extrabold text-my_green"> 21</span>
                    <p class="text-lg"> Resguardos
                    </p>
                </div>


            </div>
        </div>

    </div>

    <div class="flex flex-col bg-white">
        <h1 class="t text-center text-gray-700 text-3xl my-3">NUESTROS ALIADOS
        </h1>

        <div class="flex gap-7 flex-wrap max-w-5xl my-0 mx-auto items-center justify-center">
            <img src="{{ Vite::asset('resources/images/sedchoc.png') }}" calt="" class="rounded-lg">
            <img src="{{ Vite::asset('resources/images/pacipaz.png') }}" alt="">
            <img src="{{ Vite::asset('resources/images/onic.png') }}" alt="">
            <img src="{{ Vite::asset('resources/images/mesapermante.jpg') }}" alt="">
        </div>
    </div>


    {{-- <div class=" pt-4 bg-gray-200 w-full ">
        <div class="flex max-w-7xl my-0 mx-auto justify-center flex-col items-center">

            <h2 class="title-main">NOTICIAS DE LA SEMANA</h2>


            <div class="flex gap-3 py-5 flex-wrap justify-center my-0 mx-auto">

                @foreach ($posts as $post)
                <a href={{route('posts.show',$post)}} class="w-[400px] flex md:w-[550px]">
                    <div class="relative w-[220px] ">
                        <img src="@if($post->image) {{Storage::url($post->image->url  )}} @else https://caracoltv.brightspotcdn.com/dims4/default/3749817/2147483647/strip/true/crop/1500x839+0+0/resize/1000x559!/quality/90/?url=http%3A%2F%2Fcaracol-brightspot.s3.amazonaws.com%2Fe5%2F35%2Fa26ffe6c4119b2aab033e0b13a93%2Fquibdo-festival-atrato-detonante.jpg @endif"
                            alt="Messi" class="w-full h-full object-cover ">
                        <span
                            class="bg-gray-100 text-my_red text-[16px] font-bold absolute top-[0px] p-1">{{$post->updated_at->format('d/m/Y')}}</span>
                    </div>
                    <div class=" bg-white w-[250px] md:w-[280px] p-2 f">

                        <h3 class="font-bold pb-1"> {{$post->name}}</h3>

                        <p class="text-sm text-justify">
                        <div class="flex">
                            {!! html_entity_decode(Str::limit($post->extract, 90, '...')) !!}
                        </div>
                        </p>

                        @foreach ($post->tags as $tag)
                        <span href="{{route('posts.tag',$tag)}}"
                            class=" cursor-pointer   text-white text-[15px] font-medium mr-2 px-2 py-0.6 rounded  bg-{{$tag->color}}">{{$tag->name}}</span>
                        @endforeach
                    </div>
                </a>

                @endforeach



            </div>

            <div class="py-5 w-full px-5">
                {{$posts->links()}}
            </div>



        </div>


    </div> --}}



</x-app-layout>