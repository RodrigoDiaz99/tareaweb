<x-app-layout title="Prolifearmy | Editar Articulo">
    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg">
            <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                    <div class="max-w-md mx-auto">
                        <div class="flex items-center space-x-5">
                            <div class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">EA</div>
                            <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                                <h2 class="leading-relaxed">Editar Articulo</h2>
                                <p class="text-sm text-gray-500 font-normal leading-relaxed">Este formulario permite editar cualquier articulo.</p>
                            </div>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <form action="{{ route('article_update', $articles->id) }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                    <div class="flex flex-col">
                                        <label class="leading-loose">Nombre Articulo</label>
                                        <input type="text" name="name" onkeyup="mayus(this);" style="text-transform: uppercase;" class="px-4 py-2 border focus:ring-gray-500 focus:border-green-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600" placeholder="Nombre Articulo" value="{{ $articles->name }}" required autofocus>
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="leading-loose">Nombre Autor</label>
                                        <input type="text" name="author" onkeyup="mayus(this);" style="text-transform: uppercase;" class="px-4 py-2 border focus:ring-gray-500 focus:border-green-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600" placeholder="Nombre Autor" value="{{ $articles->author }}" required>
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="leading-loose">Portada Articulo</label>
                                        <img class="object-contain h-24 w-full" src="{{ Storage::url($articles->img_path_url)}}" alt="$book->name">
                                        <input type="text" name="cover_delete" hidden value="{{ $articles->img_path_url }}">
                                        <br>
                                        <!-- component -->
                                        <label class="w-full flex flex-col items-center px-4 py-2 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue-500 cursor-pointer hover:bg-blue-500 hover:text-white">
                                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                            </svg>
                                            <span id="coverRecive" class="mt-2 text-base leading-normal">SELECCIONE PORTADA</span>
                                            <input type='file' id="cover_file" accept="image/png, image/jpeg, image/jpg" name="cover_file" class="hidden"/>
                                        </label>
                                    </div>

                                    <div class="flex flex-col">
                                        <label class="leading-loose">Articulo en PDF</label>
                                        <iframe src="{{ Storage::url($articles->article_path_url)}}" type="application/pdf" width="100%" height="600"></iframe>
                                        <input type="text" name="book_delete" hidden value="{{ $articles->article_path_url }}">
                                        <br>
                                        <!-- component -->
                                        <label class="w-full flex flex-col items-center px-4 py-2 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue-500 cursor-pointer hover:bg-blue-500 hover:text-white">
                                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                            </svg>
                                            <span id="articleRecive" class="mt-2 text-base leading-normal">SELECCIONE LIBRO</span>
                                            <input type='file' id="article_file" accept=".pdf" name="article_file" class="hidden"/>
                                        </label>
                                    </div>
                                </div>
                                <div class="pt-4 flex items-center space-x-4">
                                    <button type="submit" class="w-full flex-col bg-transparent hover:bg-yellow-200 text-yellow-500 font-semibold hover:text-white py-2 px-1 border border-yellow-400 hover:border-transparent rounded">
                                        <i class="fas fa-upload mx-2"></i>
                                        <span>Editar Articulo</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('cover_file').onchange = function () {
            console.log(this.value);
            document.getElementById('coverRecive').innerHTML = document.getElementById('cover_file').files[0].name;
        }

        document.getElementById('article_file').onchange = function () {
            console.log(this.value);
            document.getElementById('articleRecive').innerHTML = document.getElementById('article_file').files[0].name;
        }
    </script>
    <script>
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }
    </script>
</x-app-layout>