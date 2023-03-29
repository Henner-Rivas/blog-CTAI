<x-app-layout>
    <div class="min-h-screen">
        <div class="imagen-title2 "
            style="background-image:url(http://alianzaagroecologia.redelivre.org.br/files/2016/08/Dia-Internacional-dos-Povos-Indigenas.jpg)">
            <div class="cover pl-[50px]">
                <h1 class="font-extrabold text-my_blue text-3xl">Consejo Terriorial de Autoridades indigenas del Chocó
                </h1>

                <h1 class="text-my_blue text-bold text-1xl font-medium">Contactanos</h1>


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

                            <a href="/educacion"
                                class="inline-flex items-center text-sm font-medium text-white hover:text-blue-600">

                                Contactanos
                            </a>
                        </li>




                    </ol>


                </nav>
            </div>


        </div>

        <div class="container py-8 my-0 mx-auto max-w-6xl  ">
            <h1 class="text-2xl font-medium mb-4">Contactanos</h1>



            <div>
                <div id="map" style="height: 500px;"></div>

            </div>

            <div class="flex justify-center w-full flex-col gap-3 items-center my-6">

                <h1 class="text-2xl">
                    TIENES UNA PREGUNTA
                </h1>

                <p>Simplemente comunícate a través de un email o déjanos tu mensaje, cuando tengas una petición, quejas
                    o reclamo.
                </p>

                <form action="" class="shadow-md rounded-md max-w-3xl p-3 bg-white w-full">

                    <div class="mb-6">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900"> Nombre</label>
                        <input type="text" id="default-input"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    </div>
                    <div class="mb-6">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900">
                            Email</label>
                        <input type="text" id="default-input"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    </div>

                    <div class="mb-6">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900">
                            Tema</label>
                        <input type="text" id="default-input"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    </div>
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Mensaje</label>
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Escribe tu mensaje aqui, estaremos encantado en responderte..."></textarea>


                    <button type="button"
                        class="text-white my-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Enviar</button>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>



<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiaGVubmVyMSIsImEiOiJjbGZzN2h0ZnQwM2IwM21vMWRxMXc0cWU2In0.Oo3ELBQSEoJTmhOkNWuYew'

// Crear un nuevo mapa
var map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/mapbox/streets-v11',
  center: [-76.6581, 5.6928],
  zoom: 14 // Nivel de zoom
});
</script>