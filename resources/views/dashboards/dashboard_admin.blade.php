<x-app-layout title="web | Dashboard">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Principal
        </h2>
        @if (Session::has('success'))
            <div class="bg-green-100 rounded-md p-3 m-3 flex">
                <svg class="stroke-2 stroke-current text-green-600 h-8 w-8 mr-2 flex-shrink-0" viewBox="0 0 24 24"
                    fill="none" strokeLinecap="round" strokeLinejoin="round">
                    <path d="M0 0h24v24H0z" stroke="none" />
                    <circle cx="12" cy="12" r="9" />
                    <path d="M9 12l2 2 4-4" />
                </svg>

                <div class="text-green-700">
                    <div class="font-bold text-xl">Verificado con exito</div>
                </div>
            </div>
        @endif
        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->
            @push('js')
            <script type="text/javascript">
                $('#data').on('change', function() {
                    switch (this.value) {
                        case '1':
                            const user = {!! json_encode($users_count) !!};

                            alert("La cantidad de usuarios regostrados es: " + user)
                            break;
                        case '2':
                            const book = {!! json_encode($books_count) !!};
                            alert("La cantidad de libros registrados es: " + book)

                            break;
                        case '3':
                            const video = {!! json_encode($videos_count) !!};
                            alert("La cantidad de vdeos registrados es: " + video)

                            break;

                        default:
                            alert("Escoge un valor correcto")
                            break;
                    }
                })

            </script>
        @endpush
        <div class="col-md-6">

            <label for="data" class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Escoge una
                opcion</label>


            <select name="data" id="data"
                class="px-4 py-2 border focus:ring-gray-500 border-blue-500 rounded-md focus:outline-none block w-full pl-10 mt-1 text-sm text-black">
                <option value="">Opciones</option>
                <option value="1">1. Ver usuarios registrados</option>
                <option value="2">2. Cantidad de libros</option>
                <option value="3">3. Cantidad de videos</option>
            </select>
        </div>

        </div>
      

        <!-- New Table -->
        @role('Super-Admin')
        <div>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Usuarios</th>
                                <th class="px-4 py-3 text-center">Role</th>
                                <th class="px-4 py-3 text-center">Permisos</th>
                                <th class="px-4 py-3 text-center">Fecha</th>
                                <th class="px-4 py-3 text-center"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($users as $row)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <!-- Avatar with inset shadow -->
                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                    src="{{ $row->profile_photo_url }}" alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner"
                                                    aria-hidden="true">
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-semibold">{{ $row->name }}</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400"></p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-3 text-center text-xs">
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            {{ $row->getRoleNames()[0] }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-3 text-center text-sm">
                                        <ol class="list-decimal">
                                            @foreach ($row->getAllPermissions() as $permiso => $value)
                                                <li>{{ $value->name }}</li>
                                            @endforeach
                                        </ol>
                                    </td>

                                    <td class="px-4 py-3 text-center text-sm">
                                        {{ $row->created_at }}
                                    </td>

                                    <td class="px-4 py-3 text-center text-sm">
                                        <button
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            <i class="fas fa-user-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>



            </div>

            <!-- Charts -->


        </div>
        @endrole


        @role('user')

        @endrole








        <div class="flex items-center justify-justify p-6 sm:p-12 md:w-1/2">

        </div>
    </div>






</x-app-layout>
