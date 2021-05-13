<!-- Desktop sidebar -->
<aside class="h-screen z-20 flex-shrink-0 hidden overflow-y-auto bg-gray-800 text-white md:block ">
    <div class="mt-3 mb-5 text-center">
        <a class="font-bold text-2xl" href="{{route('dashboard')}}">
           web
        </a>
    </div>    
    <div class="flex w-full max-w-md p-4">
        <ul class="flex flex-col w-full">
            
            
            <li class="my-px">
                <a href="{{route('dashboard')}}"
                    class="flex flex-row items-center h-12 px-4 rounded-lg hover:bg-gray-600">
                    <span class="flex items-center justify-center text-lg text-green-500">
                        <i class="fas fa-home"></i>
                    </span>
                    <span class="ml-3">Principal</span>
                    <!--<span class="flex items-center justify-center text-sm text-gray-500 font-semibold bg-gray-200 h-6 px-2 rounded-full ml-auto">3</span>-->
                </a>
            </li>

            @role('Super-Admin')
                
                            
              

                <li class="my-px">
                    <span class="flex font-medium text-sm text-gray-400 px-4 my-4 uppercase">Pagina principal</span>
                </li>

                <li class="my-px">
                    <a href="{{route('welcome')}}" class="flex flex-row items-center h-12 px-4 rounded-lg hover:bg-gray-600" data-toggle="collapse" href="#collapse_view" role="button" aria-expanded="false" aria-controls="collapse_view">
                        <span class="flex items-center justify-center text-lg text-blue-500">
                            <i class="far fa-newspaper"></i>
                        </span>
                        <span class="ml-3">Pagina inicial</span>
                    </a>
                </li>
               
                            
                <li class="my-px">
                    <span class="flex font-medium text-sm text-gray-400 px-4 my-4 uppercase"> Libros</span>
                </li>

                <li class="my-px">
                    <a href="{{route('book_create')}}"
                        class="flex flex-row items-center h-12 px-4 rounded-lg hover:bg-gray-600">
                        <span class="flex items-center justify-center text-lg text-blue-500">
                            
                            <i class="fas fa-upload" ></i>
                        </span>
                        <span class="ml-3">Subir libro</span>
                    </a>
                </li>

                <li class="my-px">
                    <a href="{{route('book_index')}}"
                        class="flex flex-row items-center h-12 px-4 rounded-lg hover:bg-gray-600">
                        <span class="flex items-center justify-center text-lg text-blue-500">
                            <i class="fas fa-clipboard-list"></i>
                        </span>
                        <span class="ml-3">Ver libros subidos</span>
                    </a>
                </li>

               

                
                <li class="my-px">
                    <span class="flex font-medium text-sm text-gray-400 px-4 my-4 uppercase">Video</span>
                </li>
                <li class="my-px">
                    <a href="{{route('video_create')}}"
                        class="flex flex-row items-center h-12 px-4 rounded-lg hover:bg-gray-600">
                        <span class="flex items-center justify-center text-lg text-blue-500">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="ml-3">Subir video</span>
                    </a>
                </li>
                <li class="my-px">
                    <a href="{{route('video_index')}}"
                        class="flex flex-row items-center h-12 px-4 rounded-lg hover:bg-gray-600">
                        <span class="flex items-center justify-center text-lg text-blue-500">
                            <i class="fas fa-clipboard-list"></i>
                        </span>
                        <span class="ml-3">Ver videos subidos</span>
                    </a>
                </li>
              
              
                
              
               
              
            @endrole

            @role('Admin')
                <li class="my-px">
                    <span class="flex font-medium text-sm text-gray-400 px-4 my-4 uppercase">Administrador</span>
                </li>
                <li class="my-px">
                    <span class="flex font-medium text-sm text-gray-400 px-4 my-4 uppercase">Pagina principal</span>
                </li>
                <li class="my-px">
                    <a href="{{route('welcome')}}" class="flex flex-row items-center h-12 px-4 rounded-lg hover:bg-gray-600" data-toggle="collapse"
                    href="#collapse_view" 
                                    role="button" aria-expanded="false" aria-controls="collapse_view">
                        <span class="flex items-center justify-center text-lg text-blue-500">
                            <i class="far fa-newspaper"></i>
                        </span>
                        <span class="ml-3">Pagina inicial</span>
                    </a>
                   
                   
                </li>
               
               
                
                
                            
                <li class="my-px">
                   
                    <span class="flex font-medium text-sm text-gray-400 px-4 my-4 uppercase"> Libros</span>
                </li>
                <li class="my-px">
                    <a href="{{route('book_create')}}"
                        class="flex flex-row items-center h-12 px-4 rounded-lg hover:bg-gray-600">
                        <span class="flex items-center justify-center text-lg text-blue-500">
                            
                            <i class="fas fa-upload" ></i>
                        </span>
                        <span class="ml-3">Subir libro</span>
                    </a>
                </li>
                <li class="my-px">
                    <a href="{{route('book_index')}}"
                        class="flex flex-row items-center h-12 px-4 rounded-lg hover:bg-gray-600">
                        <span class="flex items-center justify-center text-lg text-blue-500">
                            <i class="fas fa-clipboard-list"></i>
                        </span>
                        <span class="ml-3">Ver libros subidos</span>
                    </a>
                </li>
               
              
                <li class="my-px">
                    <span class="flex font-medium text-sm text-gray-400 px-4 my-4 uppercase">Video</span>
                </li>
                <li class="my-px">
                    <a href="{{route('video_create')}}"
                        class="flex flex-row items-center h-12 px-4 rounded-lg hover:bg-gray-600">
                        <span class="flex items-center justify-center text-lg text-blue-500">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="ml-3">Subir video</span>
                    </a>
                </li>
                <li class="my-px">
                    <a href="{{route('video_index')}}"
                        class="flex flex-row items-center h-12 px-4 rounded-lg hover:bg-gray-600">
                        <span class="flex items-center justify-center text-lg text-blue-500">
                            <i class="fas fa-clipboard-list"></i>
                        </span>
                        <span class="ml-3">Ver videos subidos</span>
                    </a>
                </li>
               
              
            @endrole
            @role('User')

            <li class="my-px">
                <span class="flex font-medium text-sm text-gray-400 px-4 my-4 uppercase">Usuario</span>
            </li>
            <li class="my-px">
                <a href="{{route('book_show')}}"
                    class="flex flex-row items-center h-12 px-4 rounded-lg hover:bg-gray-600">
                    <span class="flex items-center justify-center text-lg text-blue-500">
                        <i class="fas fa-book"></i>
                    </span>
                    <span class="ml-3">Libros</span>
                </a>
            </li>
            
            <li class="my-px">
                <a href="{{route('video_show')}}"
                    class="flex flex-row items-center h-12 px-4 rounded-lg hover:bg-gray-600">
                    <span class="flex items-center justify-center text-lg text-blue-500">
                        <i class="fas fa-file-video"></i>
                    </span>
                    <span class="ml-3">Videos</span>
                </a>
            </li>
            
            
            
            
           

            
            @endrole

           
        </ul>
    </div>
</aside>