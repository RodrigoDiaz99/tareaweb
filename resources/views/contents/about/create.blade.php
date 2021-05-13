<x-app-layout title="Prolifearmy ">
    <div class="p-4">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 text-gray-700 dark:text-gray-400">
            <form action="{{ route('contentabout_store') }}" method="POST">
                @csrf
               
                <h1 class="text-center text-3xl">Editar titulos</h1>
                <hr>
                <br>

                <div class="grid md:space-x-4 grid-cols-1 md:grid-cols-2">
                    <div class="flex-1">
                        <label class="block mt-4 text-sm">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Titulo 1</span>
                                <input type="text"  id="title" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
                                name="title"    autofocus required>
                                
                            </label>
                        </label>
                    </div>

                    <div class="flex-1">
                        <label class="block mt-4 text-sm">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Titulo 2</span>
                                <input type="text"  id="sub_title" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
                                 name="sub_title"    required>
                                
                            </label>
                        </label>
                    </div>
                </div>

                               <div class="py-12 flex justify-center">
                    <button type="submit" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                        <i class="fas fa-save"></i>
                        <span> Guardar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
   {{-- <script>
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }
    </script>--}}

    
    
    @section('scripts')
        <script>
            CKEDITOR.replace('title');

        </script>
        <script>
            CKEDITOR.replace('sub_title');

        </script>
    @endsection
</x-app-layout>
