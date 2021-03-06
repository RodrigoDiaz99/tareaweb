
@extends('errors::illustrated-layout')

@section('code', '404')
@section('title', __('Pagina no encontrada'))

@section('image')
<div style="background-image: url('/svg/404.svg');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('Disculpa, La pagina que estas buscando no se puede encontrar.'))
