<x-app-layout title="Prolifearmy ">

    <div class="p-4">
        <div class="container grid px-6 mx-auto">
            <div    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                <div class=" text-center my-3 text-dark ">

                    <h1 class="text-4xl">¡Bienvenido a Prolife Army {{ Auth::user()->name }}! </h1>
                    <p class="lead">Aquí se podrá realizar las modificaciones de la vista principal</p>

                </div>
                
                
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 ">
                    <div class="p-2 sm:p-10 text-center cursor-pointer text-white">
                        <div class="py-16 max-w-sm rounded overflow-hidden shadow-lg bg-white-500 hover:bg-blue-600 transition duration-500">
                            <div class="space-y-10">
                                <i class="fa fa-clipboard-list" style="font-size:48px;"></i>
                                
                                <div class="px-6 py-4">
                                    <div class="space-y-5">
                                        <div class="font-bold text-xl mb-2">Primer Parrafo</div>
                                        <p class="text-base">
                                            Módulo dedicado para la ediciion del primer parrafo de la vista de presentacion.
                                        </p>
                                        
                                        
                                    </div>
                                    
                                </div>
                                <a href="{{ route('contentup_index') }}" class="bg-transparent hover:bg-grey text-grey-dark font-semibold hover:text-white py-2 px-4 border border-grey hover:border-transparent rounded mr-2" ">
                                    Ir
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 sm:p-10 text-center cursor-pointer text-white"> 
                        <div class="py-16 max-w-sm rounded overflow-hidden shadow-lg bg-white-500 hover:bg-blue-600 transition duration-500">
                            <div class="space-y-10">
                              <i class="fas fa-exclamation-circle" style="font-size:48px;"></i>
                                <div class="px-6 py-4">
                                    <div class="space-y-5">
                                        <div class="font-bold text-xl mb-2">Acerca de</div>
                                        <p class="text-base">
                                            Módulo dedicado para la edicion de la seccion de "acerca" de la vista de presentacion.
                                        </p>
                                    </div>
                                   
                                </div>
                                <a href="{{ route('contentabout_index') }}" class="bg-transparent hover:bg-grey text-grey-dark font-semibold hover:text-white py-2 px-4 border border-grey hover:border-transparent rounded mr-2" ">
                                    Ir
                                </a>
                            </div>
                        </div>
                    </div>          
                    <div class="p-2 sm:p-10 text-center cursor-pointer text-white"> 
                        <div class="py-16 max-w-sm rounded overflow-hidden shadow-lg bg-white-500 hover:bg-blue-600 transition duration-500">
                            <div class="space-y-10">
                              <i class="fas fa-check-circle" style="font-size:48px;"></i>
                                <div class="px-6 py-4">
                                    <div class="space-y-5">
                                        <div class="font-bold text-xl mb-2">Objetivos</div>
                                        <p class="text-base">
                                            Módulo dedicado para la agregar objetivos en "acerca" de la vista de presentacion.
                                        </p>
                                    </div>
                                   
                                </div>
                                <a href="{{ route('contentobjectives_index') }}" class="bg-transparent hover:bg-grey text-grey-dark font-semibold hover:text-white py-2 px-4 border border-grey hover:border-transparent rounded mr-2" ">
                                    Ir
                                </a>
                            </div>
                        </div>
                    </div>        
                    <div class="p-2 sm:p-10 text-center cursor-pointer text-white">
                        <div class="py-16 max-w-sm rounded overflow-hidden shadow-lg bg-white-500 hover:bg-blue-600 transition duration-500">
                            <div class="space-y-10">
                                <i class="fa fa-calendar" style="font-size:48px;"></i>
                                
                                <div class="px-6 py-4">
                                    <div class="space-y-5">
                                        <div class="font-bold text-xl mb-2">Eventos</div>
                                        <p class="text-base">
                                            Módulo dedicado para agregar eventos a la vista de presentacion.
                                        </p>
                                        
                                        
                                    </div>
                                    
                                </div>
                                <a href="{{ route('contentevent_index') }}" class="bg-transparent hover:bg-grey text-grey-dark font-semibold hover:text-white py-2 px-4 border border-grey hover:border-transparent rounded mr-2" ">
                                    Ir
                                </a>
                            </div>
                        </div>
                    </div>
                   
                   


                </div>
               
            </div>
        </div>
    </div>

</x-app-layout>
