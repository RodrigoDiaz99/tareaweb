<x-app-layout title="Prolifearmy | video">
    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg">
            <div
                class="w-full overflow-x-auto font-semibold tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <div class="text-center">
                    @if (Session::has('verified'))
                        <div class="bg-green-100 rounded-md p-3 m-3 flex">
                            <svg class="stroke-2 stroke-current text-green-600 h-8 w-8 mr-2 flex-shrink-0"
                                viewBox="0 0 24 24" fill="none" strokeLinecap="round" strokeLinejoin="round">
                                <path d="M0 0h24v24H0z" stroke="none" />
                                <circle cx="12" cy="12" r="9" />
                                <path d="M9 12l2 2 4-4" />
                            </svg>

                            <div class="text-green-700">
                                <div class="font-bold text-xl">Video guardado</div>
                            </div>
                        </div>
                    @endif

                    @if(Session::has('update'))
                        <div class="bg-orange-100 rounded-md p-3 mx-3 my-3 flex">
                            <svg class="stroke-2 stroke-current text-orange-600 h-8 w-8 mr-2 flex-shrink-0" viewBox="0 0 24 24" fill="none" strokeLinecap="round" strokeLinejoin="round">
                                <path d="M0 0h24v24H0z" stroke="none" />
                                <circle cx="12" cy="12" r="9" />
                                <path d="M9 12l2 2 4-4" />
                            </svg>

                            <div class="text-orange-700">
                                <div class="font-bold text-xl">{{ Session('update') }}</div>
                            </div>
                        </div>
                    @endif
                    <div class="text-center my-3">

                        <h1 class="text-4xl">¡Bienvenido al catalogo de videos {{ Auth::user()->name }}! </h1>
                       
                        <p>Aquí el administrador podrá realizar las modificaciones pertinentes a los videos</p>
                      

                    </div>
                 
                    <div class="btn-group py-2">
                        <a href="{{route('video_create')}}"
                            class="bg-transparent hover:bg-green-400 text-green-500 font-semibold hover:text-white py-2 px-4 border border-green-400 hover:border-transparent rounded">
                            <i class="fas fa-plus mr-2"></i>
                            <span>Subir video</span>
                        </a>
                    </div>
                   
                </div>

                <div class="table-responsive">
                   
                    <h1
                        class="text-center text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800 text-3xl">
                       Videos</h1>
                    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4">

                        @forelse ($video as $row)
                            <div class="max-w-sm w-full sm:w-1/2 lg:w-1/3 py-3 px-3">
                                <div
                                    class="shadow-xl rounded-lg overflow-hidden text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <div class="bg-cover bg-center h-56 p-4"
                                        style="background-image: url({{ Storage::url($row->img_path_url) }})">
                                       
                                    </div>
                                    <div class="p-4">
                                        <p class="text-md italic bg-gray-50 dark:text-gray-400 dark:bg-gray-800">Video</p>
                                        <p class="text-md italic text-gray-900">{{$row->name}}</p>
                                       
                                    </div>
                                    
                                    <div class="flex p-4 border-t border-gray-300 text-gray-700">
                                        <div class="flex-1 inline-flex justify-between items-center">
                                            <a href="{{route('video_frame',$row->id)}}" class="bg-transparent hover:bg-blue-400 text-blue-500 font-semibold hover:text-white py-2 px-4 border border-blue-400 hover:border-transparent rounded">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        
                                            <a href="{{ route('video_edit', $row->id) }}" class="bg-transparent hover:bg-yellow-200 text-yellow-500 font-semibold hover:text-white py-2 px-4 border border-yellow-400 hover:border-transparent rounded">
                                                <i class="far fa-edit"></i>
                                            </a>

                                            <form action="{{ route('video_destroy', $row->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-transparent hover:bg-red-400 text-red-500 font-semibold hover:text-white py-2 px-4 border border-red-400 hover:border-transparent rounded">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                        
                                    <div class="px-4 pt-3 pb-4 border-t border-gray-300 bg-gray-100">
                                        <div class="text-xs uppercase font-bold text-gray-600 tracking-wide">Subido por
                                        </div>
                                        <div class="flex items-center pt-2">
                                            <img class="bg-cover bg-center w-10 h-10 rounded-full mr-3"
                                                src="{{ Auth::user()->profile_photo_url }}"
                                                alt="{{ Auth::user()->name }}">
                                            <div>
                                                <p class="font-bold text-gray-900"></p>
                                                @role('Super-Admin')
                                                    {{ $row->user->name }}
                                                    <p class="text-xs text-gray-700">SUPER-ADMIN</p>
                                                @endrole

                                                @role('Admin')
                                                    {{ $row->user->name }}
                                                    <p class="text-xs text-gray-700">ADMIN</p>
                                                @endrole
                                            </div>
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
