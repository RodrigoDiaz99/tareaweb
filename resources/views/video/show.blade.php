<x-app-layout title="Prolifearmy | Videos">
    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg">
            <div       class="w-full overflow-x-auto font-semibold tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <div class="text-center">
                   
                    <div class="text-center my-3">

                        <h1 class="text-4xl">¡Bienvenido al catalogo de videos {{ Auth::user()->name }}! </h1>
                    
                        <p>Aquí podras ver todo el catalogo de videos que tenemos</p>
                     

                    </div>
                   
                   
                   
                </div>

                <div class="table-responsive">
                   
                    <h1
                        class="text-center text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800 text-3xl">
                        VIDEOS</h1>
                    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4">

                        @forelse ($video as $row)
                            <div class="max-w-sm w-full sm:w-1/2 lg:w-1/3 py-3 px-3">
                                <div
                                    class="shadow-xl rounded-lg overflow-hidden text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <div class="bg-cover bg-center h-56 p-4"
                                        style="background-image: url({{ Storage::url($row->img_path_url) }})">
                                       
                                    </div>
                                    <div class="p-4">
                                        <p class="text-md italic text-gray-900">Video</p>
                                        <p class="text-md italic text-gray-900">{{ $row->name }}</p>

                                    </div>

                                    <div class="flex text-center p-4 border-t border-gray-300 text-gray-700">
                                        <div class="flex-1 inline-flex items-center">
                                            <a href="{{route('video_frame',$row->id)}}" class="w-full flex-col bg-transparent hover:bg-blue-400 text-blue-500 font-semibold hover:text-white py-2 px-4 border border-blue-400 hover:border-transparent rounded">
                                                <i class="far fa-play-circle"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="bg-teal-100 mx-4 my-4 px-4 py-3 border-t-4 border-teal-500 rounded-b text-teal-900 shadow-md"
                                role="alert">
                                <div class="flex">
                                    <div class="px-4">
                                        <i class="fas fa-folder-open"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold"> No hay documentos Guardados</p>
                                        <p class="text-sm">Al parecer el sistema no cuenta con ningun libro o documento PDF
                                            <i class="far fa-file-pdf"></i> guardado en el sistema, recuerda que para subir
                                            algún documento debes acceder a la opción libros, subir libro accediento a esta
                                            opción podrás subir y almacenar todos los libros que te gustaria compartir.
                                        </p>
                                        <hr class="my-2">
                                        <p class="mb-0">Si presentas mayores problemas comunicate a <strong><a href="#"
                                                    class="alert-heading hover:text-red-500">Soporte Tecnico.</a></strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>

               

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
