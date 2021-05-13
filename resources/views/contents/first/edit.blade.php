<x-app-layout title="Prolifearmy ">
    <div class="p-4">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 text-gray-700 dark:text-gray-400">
            <form action="{{ route('contentup_update',$content->id) }}" method="POST">
                @csrf
                @method('PUT')
                <h1 class="text-center text-3xl">Editar parrafos</h1>
                <hr>
                <br>

                <div class="grid md:space-x-4 grid-cols-1 md:grid-cols-2">
                    <div class="flex-1">
                        <label class="block mt-4 text-sm">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Parrafo 1</span>
                                <input type="text" id="first_paragraph"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="first_paragraph" value="{{$content->first_paragraph}}" autofocus required>

                            </label>
                        </label>
                    </div>

                    <div class="flex-1">
                        <label class="block mt-4 text-sm">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Parrafo 2</span>
                                <input type="text" id="second_paragraph"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="second_paragraph" value="{{$content->second_paragraph}}" required>

                            </label>
                        </label>
                    </div>
                    <div class="flex-1">
                        <label class="block mt-4 text-sm">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Parrafo 3</span>
                                <input type="text" id="third_paragraph"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="third_paragraph" value="{{$content->third_paragraph}}" required>

                            </label>
                        </label>
                    </div>
                </div>

                <div class="py-12 flex justify-center">
                    <button type="submit"
                        class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
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
    </script> --}}



    @section('scripts')
        <script>
            CKEDITOR.replace('first_paragraph');

        </script>
        <script>
            CKEDITOR.replace('second_paragraph');

        </script>
         <script>
            CKEDITOR.replace('third_paragraph');

        </script>
    @endsection
</x-app-layout>
