<x-app-layout title="Prolifearmy ">
    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg">
            <div
                class="w-full overflow-x-auto font-semibold tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <div class="text-center mt-3">
                    <h1 class="text-4xl">¡Bienvenido a Prolife Army {{ Auth::user()->name }}! </h1>
                    <p class="text-center font-italic">En esta sección se hace la administración del contenido de la
                        página principal en donde se podrá establecer los datos del contenido principal, en el area de
                        acerca de
                    <p class="small text-center"></p>

                    @if (count($contents) > 0)
                    @else
                        <div class="btn-group py-2">
                            <a href="{{ route('contentabout_create') }}"
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
                                    <th class="px-4 py-3">Titulo</th>

                                    <th class="px-4 py-3">Subtitulo</th>
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
                                                    <p class="font-semibold">{{ $row->title }}</p>
                                                    <p class="text-xs text-gray-600 dark:text-gray-400">

                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-4 py-3 text-xs">
                                            <span class="px-2 py-1 font-semibold">
                                                {{ $row->sub_title }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <a href="{{ route('contentabout_edit', $row->id) }}"
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

                {{-- <div class="row d-flex justify-content-center">
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
                          
               
                </div> --}}




            </div>
        </div>
    </div>

</x-app-layout>
