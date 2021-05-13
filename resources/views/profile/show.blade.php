<x-app-layout title="Perfil">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-white dark:text-gray-200">
            Perfil
        </h2>

        <h4 class="mb-4 text-lg font-semibold text-white dark:text-gray-300">
            {{ __('Informacion de Perfil') }}
        </h4>

        @livewire('profile.update-profile-information-form')

        <x-section-border />

        <div class="mt-10 sm:mt-0">
            <h4 class="mb-4 text-lg font-semibold text-white dark:text-gray-300">
                {{ __('Actualizar Contraseña') }}
            </h4>

            @livewire('profile.update-password-form')
        </div>

        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
        <x-section-border />
{{-- 
        <div class="mt-10 sm:mt-0">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                {{ __('Autentificador de dos factores') }}
            </h4>

            @livewire('profile.two-factor-authentication-form')
        </div>--}}
        @endif

        <x-section-border />

        <div class="mt-10 sm:mt-0">
            <h4 class="mb-4 text-lg font-semibold text-white dark:text-gray-300">
                {{ __('Sesiones en Navegadores') }}
            </h4>

            @livewire('profile.logout-other-browser-sessions-form')
        </div>

        <x-section-border />

       {{-- <div class="mt-10 sm:mt-0">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                {{ __('Borrar Cuenta') }}
            </h4>

            @livewire('profile.delete-user-form')
        </div>--}}

    </div>
</x-app-layout>