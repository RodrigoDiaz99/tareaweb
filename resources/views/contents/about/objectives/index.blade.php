<x-app-layout title="Prolifearmy ">
    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg">
            <div
                class="w-full overflow-x-auto font-semibold tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <div class="text-center mt-3">
                    <h1 class="text-4xl">¡Bienvenido a Prolife Army {{ Auth::user()->name }}! </h1>
                    <p class="text-center font-italic">En esta sección se hace la administración de contenido de la
                        página principal
                        en
                        donde se podran colocar los objetivos de la seccion acerca de.</p>


                    @if (count($contents) > 0)
                    @else
                    <div class="btn-group py-2">
                        <a href="{{ route('contentobjectives_create') }}"
                            class="bg-transparent hover:bg-green-400 text-green-500 font-semibold hover:text-white py-2 px-4 border border-green-400 hover:border-transparent rounded">
                            <i class="fas fa-plus mr-2"></i>
                            <span>Añadir contenido</span>
                        </a>
                    </div>
                        
                    @endif
                </div>
                 <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">objetivo 1</th>
                            <th class="px-4 py-3">objetivo 2</th>
                            <th class="px-4 py-3">objetivo 3</th>
                            <th class="px-4 py-3">objetivo 4</th>
                            
                            <th class="px-4 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($contents as $row)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    
                                    <div>
                                        <p class="font-semibold">{{ $row->objectives1 }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    
                                    <div>
                                        <p class="font-semibold">{{ $row->objectives2 }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    
                                    <div>
                                        <p class="font-semibold">{{ $row->objectives3 }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    
                                    <div>
                                        <p class="font-semibold">{{ $row->objectives4 }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            
                                        </p>
                                    </div>
                                </div>
                            </td>
                           
                            
                            <td class="px-4 py-3 text-sm">
                                <a href="{{ route('contentobjectives_edit', $row->id) }}"
                                    class="btn btn-sm btn-warning mt-3" style="yellow"><i
                                        class="fas fa-edit"></i>
                                    Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
           
        </div>

                {{--<div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h2>Contenido de la página principal</h2>
                                <div class="responsive-table">
                                    
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>

                                                <th>titulo</th>
                                                <th>subitulo</th>
                                                <th>Añadir objetivos</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contents as $row)

                                                <tr>
                                                    <td>{{ $row->title }}</td>
                                                    <td>{{ $row->sub_title }}</td>
                                                    <td>
                                                        <a href="{{ route('contentobjetives_create') }}"
                                                            class="btn btn-sm btn-warning mt-3"><i
                                                                class="fas fa-edit"></i> Añadir
                                                            objetivos</a>
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('contentabout_edit', $row->id) }}"
                                                            class="btn btn-sm btn-warning mt-3"><i
                                                                class="fas fa-edit"></i>
                                                            Editar</a>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <div>
                          
               
                </div>--}}




            </div>
        </div>
    </div>

</x-app-layout>



{{-- @extends('layouts.dashboard')
@section('content')

<div class="container">
    <div class="text-center mt-3">
        <h2 class="text-center font-weight-bold">Contenido de la página principal</h2>
        <p class="text-center font-italic">En esta sección se hace la administración de contenido de la página principal
            en
            donde se podrá establecer los datos del contenido principal, así como el objetivo. También la sección de los
            perfiles junto con la carga de archivos.</p>
        <p class="small text-center">Se establece mediante una plantilla.</p>

        @if (count($contents) < 3)
        <p class="text-center"><a href="{{ route('contentobjetives_create') }}"
            class="btn btn-sm btn-outline-primary">Añadir
            contenido</a></p>
        @else

        @endif
    </div>

            <div class="row  justify-content-center">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Numero de objetivo</th>
                                            <th>objetivo</th>

                                               <th >Opcion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contents as $row)
                                            <tr>

                                                <td>{!! $row->id !!}</td>
                                                <td>{!! $row->objectives !!}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('contentobjetives_edit', $row->id) }}"
                                                            class="btn btn-sm btn-link"><i class="fas fa-edit"
                                                                style="color:orange;"></i> Editar</a>


                                                    </div>
                                                </td>

                                            </tr>
                                            @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
--}}