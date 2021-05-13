<x-app-layout title="Prolifearmy ">
    <div class="p-4">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 text-gray-700 dark:text-gray-400">
            <form action="{{ route('contentobjectives_update',$content3->id) }}" method="POST">
                @csrf
                @method('PUT')
                <h1 class="text-center text-3xl">Editar objetivos</h1>
                <hr>
                <br>

                <div class="grid md:space-x-4 grid-cols-1 md:grid-cols-2">
                    <div class="flex-1">
                        <label class="block mt-4 text-sm">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Objetivo 1</span>
                                <input type="text" id="objectives1"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="objectives1" value="{{ $content3->objectives1 }}" autofocus required>

                            </label>
                        </label>
                    </div>

                    <div class="flex-1">
                        <label class="block mt-4 text-sm">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Objetivo 2</span>
                                <input type="text" id="objectives2"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="objectives2" value="{{ $content3->objectives2 }}" required>

                            </label>
                        </label>
                    </div>
                    <div class="flex-1">
                        <label class="block mt-4 text-sm">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Objetivo 3</span>
                                <input type="text" id="objectives3"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="objectives3" value="{{ $content3->objectives3 }}" required>

                            </label>
                        </label>
                    </div>
                    <div class="flex-1">
                        <label class="block mt-4 text-sm">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Objetivo 4</span>
                                <input type="text" id="objectives4"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="objectives4" value="{{ $content3->objectives4 }}" required>

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
            CKEDITOR.replace('title');

        </script>
        <script>
            CKEDITOR.replace('sub_title');

        </script>
    @endsection
</x-app-layout>





{{--@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="text-center border-bottom"><i class="fas fa-file-alt"></i> Contenido</h1>
                        <form action="" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group">

                                <label for="first_paragraph">Primera seccion</label>
                                <input type="text" name="first_paragraph" id="first_paragraph"
                                class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="second_paragraph">Segunda sección</label>
                                <input type="text" name="second_paragraph" id="second_paragraph"
                                  class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="second_paragraph">tercera sección</label>
                                <input type="text" name="second_paragraph" id="second_paragraph"
                                  class="form-control" value="">
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary my-3"><i class="fas fa-save"></i>
                                Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        CKEDITOR.replace('first_paragraph');

    </script>
    <script>
        CKEDITOR.replace('second_paragraph');

    </script>
@endsection--}}
