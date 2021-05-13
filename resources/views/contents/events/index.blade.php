<x-app-layout title="Prolifearmy ">
    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg">
            <div
                class="w-full overflow-x-auto font-semibold tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <div class="text-center mt-3">
                    <h1 class="text-4xl">¡Bienvenido a Prolife Army {{ Auth::user()->name }}! </h1>
                    <p class="text-center font-italic">En esta sección se hace la administración de contenido de la
                        página principal
                       en donde se podran añadir eventos Maximo 3 eventos.</p>
                    <p class="small text-center">Se establece mediante una plantilla.</p>

                    @if (count($contents) < 3)
                    <div class="btn-group py-2">
                        <a href="{{ route('contentevent_create') }}"
                            class="bg-transparent hover:bg-green-400 text-green-500 font-semibold hover:text-white py-2 px-4 border border-green-400 hover:border-transparent rounded">
                            <i class="fas fa-plus mr-2"></i>
                            <span>Añadir contenido</span>
                        </a>
                    </div>
                    @else
                   

                        
                    @endif
                </div>
                 <!-- New Table -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Nombre Evento</th>
                                    <th class="px-4 py-3">Fecha</th>
                                    <th class="px-4 py-3">Hora</th>
                                    <th class="px-4 py-3">Lugar</th>
                                    <th class="px-4 py-3">Descripcion</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @foreach ($contents as $row)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <!-- Avatar with inset shadow -->
                                            
                                            <div>
                                                <p class="font-semibold">{{ $row->name_event}}</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                                    
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                
                                    <td class="px-4 py-3 text-xs">
                                        <span
                                            class="px-2 py-1 font-semibold">
                                            {{ $row->date}}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        <span
                                            class="px-2 py-1 font-semibold">
                                            {{ $row->hour}}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        <span
                                            class="px-2 py-1 font-semibold">
                                            {{ $row->place}}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        <span
                                            class="px-2 py-1 font-semibold">
                                            {{ $row->description}}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <a href="{{ route('contentevent_edit', $row->id) }}"
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
            </div>
        </div>
    </div>
</x-app-layout>
