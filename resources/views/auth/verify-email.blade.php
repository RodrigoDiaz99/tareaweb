<x-app-layout title="Prolifearmy | Verificacion">
    <div class="p-4">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
              
                <div class="flex items-center justify-justify p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200 ">Olvidaste la Contraseña
                        </h1>
                        <h6 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200 justify">
                            {{ __('Gracias por registrarte! Antes de comenzar, verifica tu email presionando el link que se envio a tu correo, si no recibiste el email, Te podremos enviar otro presionando el boto de reenviar verification. (Verificar la carpeta de correo no deseado)') }}
                        </h6>
                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 text-xl font-semibold text-red-700 dark:text-red-700 justify bg-green-100 rounded-md p-3 mx-3 my-3 flex">
                                {{ __('Un nuevo link de verificacion a sido enviado a tu correo. (Verificar la carpeta de correo no deseado)') }}
                            </div>
                        @endif
                        <div class="mt-4 flex items-center justify-between">

                            <form method="POST" action="/email/verification-notification">
                                @csrf

                                <p class="mt-4">
                               
                                    <button type="submit"
                                        class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"
                                        type="submit">
                                        {{ __('Resend Verification Email') }}
                                    </button>
                                
                            </p>
                            </form>

                            <form method="POST" action="/logout">
                                @csrf
                                <p class="mt-4">
                                <button type="submit"
                                    class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"
                                    type="submit">
                                    {{ __('Logout') }}
                                </button>
                            </p>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

            {{-- <div
                class="w-full overflow-x-auto font-semibold tracking-wide text-left text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                <div class="text-center">

                    <div class="bg-green-100 rounded-md p-3 mx-3 my-3 flex">
                        {{ __('Gracias por registrarte! Antes de comenzar, verifica tu email presionando el link que se envio a tu correo, si no recibiste el email, Te podremos enviar otro presionando el boto de reenviar verification.') }}
                    </div>

                    @if (session('status') == 'verification-link-sent')
                        <div class="bg-green-100 rounded-md p-3 mx-3 my-3 flex">
                            {{ __('Un nuevo link de verification a sido enviado a tu correo.') }}
                        </div>
                    @endif
                </div>
                <div class="mt-4 flex items-center justify-between">
                    
                        <form method="POST" action="/email/verification-notification">
                            @csrf


                            <div class="btn-group py-2">
                                <x-button type="submit">
                                    {{ __('Resend Verification Email') }}
                                </x-button>
                            </div>

                        </form>

                        <form method="POST" action="/logout">
                            @csrf

                            <x-button type="submit" >
                                {{ __('Logout') }}
                            </x-button>
                        </form>
                   
                </div>
            </div> --}}
        </div>
    </div>
    </x-guest-layout>
