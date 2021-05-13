@extends('layouts.appindex')
@section('content')
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand logo" href="{{ url('/') }}">{{ config('app.name', 'Prolife Army') }} </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="mdi mdi-menu"> </i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <div class="d-lg-none d-flex justify-content-between px-4 py-3 align-items-center">

                    <a href="javascript:;" class="close-menu"><i class="mdi mdi-close"></i></a>
                </div>
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Inicio<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#about">Acerca</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contactanos</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link btn btn-success" href="{{ route('login') }}">{{ __('Acceso') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link btn btn-success" href="{{ route('register') }}">{{ __('Registro') }}</a>
                            </li>
                        @endif
                    @else
                        {{-- <a id="navbarDropdown" class="nav-link btn btn-success" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a> --}}
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                {{ __('Panel') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-success" href="{{ route('logout') }}"
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
    </nav>
    {{-- Aqui empieza banner --}}

    <section id="home" class="home">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-banner">
                        <div class="d-sm-flex justify-content-between">
                            <div data-aos="zoom-in-up">
                                <div class="banner-title">
                                    @if (count($content) > 0)
                                        @foreach ($content as $row)
                                            <h3 class="font-weight-medium">{!! $row->first_paragraph !!}</h3>
                                        @endforeach
                                    @else
                                        <h3 class="font-weight-medium">No se tiene contenido aún. Estamos trabajando
                                            para mejorar.</h3>
                                    @endif
                                </div>
                                @if (count($content) > 0)
                                    @foreach ($content as $row)
                                        <p class="mt-3">{!! $row->second_paragraph !!}
                                            <br>{!! $row->third_paragraph !!}</br>
                                        </p>
                                    @endforeach
                                @else
                                    <p class="mt-3">No se tiene contenido aún. Estamos trabajando para mejorar.</p>
                                @endif
                            </div>
                            <div class="mt-5 mt-lg-0">
                                <img src="images/army.png" alt="prolifearmy" class="img-fluid" data-aos="zoom-in-up">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our-services" id="services">
        <div class="container">
            <div class="center" data-aos="fade-up">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/3q--VbVAfJA" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>

            </div>
        </div>
    </section>
    {{-- Aqui termina banners|Aqui empieza Quienes somo --}}
    <section class="our-process" id="about">
        <div class="container">
            <div class="row" data-aos="fade-up">
                <div class="col-sm-6" data-aos="fade-up">
                    <h5 class="text-dark"></h5>
                    @if (count($content2) > 0)
                        @foreach ($content2 as $row)
                            <h3 class="font-weight-medium text-dark">{!! $row->title !!}</h3>
                            <h5 class="text-dark mb-3">{!! $row->sub_title !!}</h5>
                        @endforeach
                    @else
                        <h3 class="font-weight-medium text-dark">No se tiene contenido aún. Estamos trabajando para
                            mejorar.</h3>
                        <h5 class="text-dark mb-3">No se tiene contenido aún. Estamos trabajando para mejorar.</h5>
                    @endif

                    @if (count($content3) > 0)
                        @foreach ($content3 as $row)
                            <div class="d-flex justify-content-start mb-3">
                                <img src="images/tick.png" alt="tick" class="mr-3 tick-icon">
                                <p class="mb-0">{!! $row->objectives1 !!}</p>
                            </div>
                            <div class="d-flex justify-content-start mb-3">
                                <img src="images/tick.png" alt="tick" class="mr-3 tick-icon">
                                <p class="mb-0">{!! $row->objectives2 !!}</p>
                            </div>
                            <div class="d-flex justify-content-start">
                                <img src="images/tick.png" alt="tick" class="mr-3 tick-icon">
                                <p class="mb-0">{!! $row->objectives3 !!}</p>
                            </div>
                            <div class="d-flex justify-content-start">
                                <img src="images/tick.png" alt="tick" class="mr-3 tick-icon">
                                <p class="mb-0">{!! $row->objectives4 !!}</p>
                            </div>
                        @endforeach
                    @else
                        <div class="d-flex justify-content-start">
                            <img src="images/tick.png" alt="tick" class="mr-3 tick-icon">
                            <p class="mb-0">No se tiene contenido aún. Estamos trabajando para mejorar.</p>
                        </div>
                    @endif

                </div>
                <div class="col-sm-6 text-right" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                    data-aos-duration="2000">
                    <img src="images/idea.png" alt="idea" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    {{-- Aqui termina quienes somos|Aqui empieza linea azul --}}
    <section class="testimonial" id="testimonial">

    </section>

    {{-- Aqui termina linea azul|Aqui empieza eventos --}}
    <section class="pricing-list" id="events">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-offset="-500">
                <div class="col-sm-12">
                    <div class="d-sm-flex justify-content-between align-items-center mb-2">
                        <div>
                            <h3 class="font-weight-medium text-dark ">Eventos</h3>
                            <h5 class="text-dark ">AQUI PUEDEN VISUALIZAR TODOS NUESTROS EVENTOS</h5>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row" data-aos="fade-up" data-aos-offset="-300">

                @foreach ($events as $event => $value)
                    <div class="col-sm-4">
                        <div class="pricing-box">

                            <img src="images/saving-strategy.svg" alt="starter">

                            <h1 class="text-amount mb-4 mt-2">{{ $value->name_event }}</h1>
                            <span class="font-weight-medium title-text">{{ $value->description }}</span>

                            <ul class="pricing-list">
                                <li>Fecha: {{ $value->date }}</li>
                                <li>Hora: {{ $value->hour }}</li>
                                <li>Ubicación: {{ $value->place }}</li>
                            </ul>
                            <a href="#" class="btn btn-outline-primary">Evento</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    {{-- Aqui termina eventos|Aqui empieza Contacto --}}
    <section class="contactus" id="contact">
        <div class="container">
            <div class="row mb-5 pb-5">
                <div class="col-sm-5" data-aos="fade-up" data-aos-offset="-500">
                    <img src="images/contact.jpg" alt="contact" class="img-fluid">
                </div>
                
                <div class="col-sm-7" data-aos="fade-up" data-aos-offset="-500">
                    <h3 class="font-weight-medium text-dark mt-5 mt-lg-0">Contactanos</h3>
                    @if (Session::has('message_sent'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message_sent') }}
                        </div>
                    @endif
                    <form action="{{ route('contact_send') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Nombre*</label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email*</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="message">Mensaje*</label>
                                    <textarea name="msg" id="msg" class="form-control" rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-secondary" value="Enviar"></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>




@endsection
