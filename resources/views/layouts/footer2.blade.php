<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <address>
                        {{-- <p class="text-white">143 castle road 517</p>
                        <p class="text-white">district, kiyev port south Canada</p> --}}
                        <div class="d-flex align-items-center">
                            <p class="mr-4 mb-0" class="text-white"></p>
                            <a href="mailto:info@yourmail.com" class="text-white">contacto@armyprolife.com</a>
                        </div>

                    </address>
                    <div class="social-icons">
                        <h6 class="footer-title font-weight-bold">
                            Redes Sociales
                        </h6>
                        <div class="d-flex">
                            <a href="{{ url('https://www.facebook.com/ProLifeArmyMx') }}"><i
                                    class="mdi mdi-facebook-box"></i></a>
                            <a href="{{ url('https://twitter.com/ProLifeArmy2') }}"><i class="mdi mdi-twitter"></i></a>
                            <a href="{{ url('https://www.instagram.com/explore/tags/prolifearmy/') }}"><i
                                    class="mdi mdi-instagram"></i></a>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="footer-title">Menu</h6>
                            <ul class="list-footer">
                                <li class="nav-item dropdown"><a href="{{ url('/') }}"
                                        class="text-white">Inicio</a></li>
                                <li class="nav-item dropdown"><a href="#about" class="text-white">Acerca</a></li>
                                <li class="nav-item dropdown"><a href="#events" class="text-white">Eventos</a></li>
                                <li class="nav-item dropdown"><a href="#contact" class="text-white">Contacto</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <h6 class="footer-title">Acceso</h6>
                            <ul class="list-footer">
                                @guest
                                    <li class="nav-item dropdown">
                                        <a href="{{ route('login') }}" class="text-white"><i
                                                class="fas fa-sign-in-alt"></i>
                                            {{ __('Iniciar sesión') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item dropdown">
                                            <a href="{{ route('register') }}" class="text-white"><i
                                                    class="fas fa-sign-in-alt"></i>
                                                {{ __('Register') }}</a>
                                        </li>

                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="footer-link" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>
                                    <li class="nav-item dropdown">
                                        <a href="{{ route('dashboard') }}" class="text-white"><i
                                                class="fas fa-sign-in-alt"></i>
                                            {{ __('Panel') }}</a>
                                    </li>


                                    <a class="footer-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    </li>
                                @endguest

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
