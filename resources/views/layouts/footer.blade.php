<footer class="bg-white">
    <div class="container mx-auto px-8">
      <div class="w-full flex flex-col md:flex-row py-6">
        <div class="flex-1 mb-6 text-black">
          <a class="text-blue-600 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
            <!--Icon from: http://www.potlabicons.com/ -->
            
           PROLIFEARMY
          </a>
        </div>
        <div class="flex-1">
          <p class="uppercase text-gray-500 md:mb-6">Inicio</p>
          <ul class="list-reset mb-6">
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="#about" class="no-underline hover:underline text-gray-800 hover:text-blue-500">Acerca</a>
            </li>
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="#events" class="no-underline hover:underline text-gray-800 hover:text-blue-500">Eventos</a>
            </li>
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="#contact" class="no-underline hover:underline text-gray-800 hover:text-blue-500">Contactos</a>
            </li>
          </ul>
        </div>
        
        <div class="flex-1">
          <p class="uppercase text-gray-500 md:mb-6">Social</p>
          <ul class="list-reset mb-6">
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="{{ url('https://www.facebook.com/ProLifeArmyMx') }}" class="no-underline hover:underline text-gray-800 hover:text-blue-500">Facebook</a>
            </li>
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="{{ url('https://twitter.com/ProLifeArmy2') }}" class="no-underline hover:underline text-gray-800 hover:text-blue-500">Instagram</a>
            </li>
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="{{ url('https://www.instagram.com/explore/tags/prolifearmy/') }}" class="no-underline hover:underline text-gray-800 hover:text-blue-500">Twitter</a>
            </li>
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="{{ url('https://t.me/CarlosRamirezMx') }}" class="no-underline hover:underline text-gray-800 hover:text-blue-500">Telegram</a>
            </li>
          </ul>
        </div>
        <div class="flex-1">
          <p class="uppercase text-gray-500 md:mb-6">Acceso</p>
          <ul class="list-reset mb-6">

            @guest
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="{{ route('login') }}" class="no-underline hover:underline text-gray-800 hover:text-pink-500">{{ __('Iniciar sesión') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="{{ route('register') }}" class="no-underline hover:underline text-gray-800 hover:text-pink-500">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">{{ Auth::user()->name }}</a>
            </li>
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="{{ route('dashboard') }}" class="no-underline hover:underline text-gray-800 hover:text-pink-500">{{ __('Panel') }}</a>
            </li>
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="{{ route('logout') }}" class="no-underline hover:underline text-gray-800 hover:text-pink-500" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">{{ __('Cerrar Sesion') }}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </div>
   
  </footer>