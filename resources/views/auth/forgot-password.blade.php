<x-guest-layout title="Prolifearmy | Recuperar Cuenta">
    <div class="p-4">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
                        src="{{ asset('img/logo.png') }}" alt="prolifearmy" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                        src="{{ asset('img/logo.png') }}" alt="prolifearmy" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">Olvidaste la Contraseña
                        </h1>
                        @if ($errors->any())
                            <div class="mb-4">
                                <div class="font-medium text-red-600">Whoops! Algo va mal.</div>

                                <ul class="mt-3 text-sm text-red-600 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="mb-4 text-sm font-medium text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="text-gray-700 dark:text-gray-400">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-0 form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit"
                                        class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                                        {{ __('Enviar link Para Resetear Contraseña') }}
                                    </button>
                                </div>
                            </div>
                        </form>


                        <p class="mt-4">

                            <a class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline"
                                href="{{ route('login') }}">
                                {{ __('Iniciar Sesion') }}
                            </a>
                        </p>
                        <p class="mt-4">

                            <a class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline"
                                href="{{ route('welcome') }}">
                                {{ __('Volver al Inicio') }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
