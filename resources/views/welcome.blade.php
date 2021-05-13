 @extends('layouts.appindex')
 @section('content')

     <body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
         <!--Nav-->
         <nav id="header" class="fixed w-full z-30 top-0 text-white ">
             <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
                 <div class="pl-4 flex items-center">
                     <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
                         href="#">
                         <!--Icon from: http://www.potlabicons.com/ -->

                         web
                     </a>
                 </div>
                 <div class="block lg:hidden pr-4">
                     <button id="nav-toggle"
                         class="flex items-center p-1 text-white-100 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                         <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                             <title>Menu</title>
                             <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                         </svg>
                     </button>
                 </div>
                 <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-white p-4 lg:p-0 z-20"
                     id="nav-content">
                     <ul class="list-reset lg:flex justify-end flex-1 items-center">


                         @guest
                             <li class="mr-3">
                                 <a id="navAction"
                                     class="x-auto lg:mx-0 hover:underline bg-black text-white font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
                                     href="{{ route('login') }}">{{ __('Acceso') }}</a>
                             </li>
                             @if (Route::has('register'))
                                 <li class="mr-3">
                                     <a id="navAction"
                                         class="x-auto lg:mx-0 hover:underline bg-black text-white font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
                                         href="{{ route('register') }}">{{ __('Registro') }}</a>
                                 </li>
                             @endif
                         @else
                             <li class="mr-3">
                                 <a id="navAction" href="{{ route('dashboard') }}"
                                     class="x-auto lg:mx-0 hover:underline bg-black text-white font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                     {{ __('Panel') }}</a>
                             </li>
                             <li class="mr-3">
                                 <a id="navAction"
                                     class="x-auto lg:mx-0 hover:underline bg-black text-white font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
                                     href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         document.getElementById('logout-form').submit();">
                                     {{ __('Cerrar Sesion') }}
                             </a>
                             <li>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                     @csrf
                                 </form>
                             @endguest

                     </ul>

                 </div>
             </div>
             <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
         </nav>
         <!--Hero-->

         <!--Right Col-->
         <div>
             <div>
                @if (Route::has('login'))

                @auth
        
                    <div class="min-w-screen min-h-screen bg-gray-50 flex items-center justify-center py-5">
                        <div class="w-full bg-white border-t border-b border-gray-200 px-5 py-16 md:py-24 text-gray-800 font-light">
                            <div class="w-full max-w-6xl mx-auto pb-5">
                                <div class="-mx-3 md:flex items-center">
                                    <div class="px-3 md:w-2/3 mb-10 md:mb-0">
                                        <h1 class="text-6xl md:text-8xl font-bold mb-5 leading-tight">Bienvenido <br
                                                class="hidden md:block">de regreso</h1>
                                        <h2 class="text-gray-600 mb-7 md:text-4xl leading-tight">{{ auth()->user()->name }}
                                           </h2>
                                        <div>
                                            <span class="inline-block w-40 h-1 rounded-full bg-blue-500"></span>
                                            <span class="inline-block w-3 h-1 rounded-full bg-blue-500 ml-1"></span>
                                            <span class="inline-block w-1 h-1 rounded-full bg-blue-500 ml-1"></span>
                                        </div>
                                    </div>
                                    <div class="px-3 md:w-1/3">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                @else
        
                    <div class="min-w-screen min-h-screen bg-gray-50 flex items-center justify-center py-5">
                        <div class="w-full bg-white border-t border-b border-gray-200 px-5 py-16 md:py-24 text-gray-800 font-light">
                            <div class="w-full max-w-6xl mx-auto pb-5">
                                <div class="-mx-3 md:flex items-center">
                                    <div class="px-3 md:w-2/3 mb-10 md:mb-0">
                                        <h1 class="text-6xl md:text-8xl font-bold mb-5 leading-tight">Gracias <br
                                                class="hidden md:block">Por visitarnos</h1>
                                        
                                        <div>
                                            <span class="inline-block w-40 h-1 rounded-full bg-blue-500"></span>
                                            <span class="inline-block w-3 h-1 rounded-full bg-blue-500 ml-1"></span>
                                            <span class="inline-block w-1 h-1 rounded-full bg-blue-500 ml-1"></span>
                                        </div>
                                    </div>
                                    <div class="px-3 md:w-1/3">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth
            @endif
        
             </div>
         </div>














         <!-- Change the colour #f8fafc to match the previous section colour -->







         <!--Footer-->

         <!-- jQuery if you need it
                                                                                          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                                                                          -->



     @endsection
