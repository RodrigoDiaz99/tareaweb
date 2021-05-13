<x-app-layout title="Prolifearmy | Libros">
    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg">
            <div
                class="w-full overflow-x-auto font-semibold tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <div class="text-center">
                   

                  
                    <div class="text-center my-3">

                        <h1 class="text-4xl">¡Bienvenido a la lista de libros {{ Auth::user()->name }}! </h1>
                      
                        <p>Aquí podras ver nuestro catalogo de libros</p>
                   

                    </div>
                   
                </div>

                <div class="table-responsive">
                 
                    <h1
                        class="text-center text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800 text-3xl">
                        LIBROS</h1>
                    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4">
                        @forelse ($book as $book)
                            <div class="max-w-sm w-full sm:w-1/2 lg:w-1/3 py-3 px-3">
                                <div
                                    class="shadow-xl rounded-lg overflow-hidden text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <div class="bg-cover bg-center h-56 p-4"
                                        style="background-image: url({{ Storage::url($book->img_path_url) }})">
                                       
                                    </div>
                                    <div class="p-4">
                                        <p class="text-md italic bg-gray-50 dark:text-gray-400 dark:bg-gray-800">{{ $book->name }}</p>
                                        <p class="text-sm flex items-center bg-gray-50 dark:text-gray-400 dark:bg-gray-800"><i
                                                class="far fa-user-circle mr-2"></i> {{ $book->author }}</p>
                                    </div>
                                    <div class="flex p-4 border-t border-gray-300 text-gray-700">
                                        <div class="flex-1 inline-flex justify-between items-center">
                                            <a target="_blank" href="{{ Storage::url($book->book_path_url) }}"
                                                class="bg-transparent hover:bg-blue-400 text-blue-500 font-semibold hover:text-white py-2 px-4 border border-blue-400 hover:border-transparent rounded">
                                                <i class="far fa-eye"></i>
                                            </a>

                                            <a href="{{ route('book_download', $book->id) }}"
                                                class="bg-transparent hover:bg-green-200 text-green-500 font-semibold hover:text-white py-2 px-4 border border-green-400 hover:border-transparent rounded">
                                                <i class="fas fa-file-download"></i>
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
                                            opción podrás subir y almacenar todos los libros que te gustaria compartir.</p>
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
