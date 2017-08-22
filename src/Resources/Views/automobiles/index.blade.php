@php $layout = 'automobile::layouts.default'; @endphp
@php $title = 'Listado'; @endphp
@extends($layout)
@section('title', $title)
@section('content')
  <header class="Titulo-Pagina">
    <h1>Automotores <small>{{ $title }}</small></h1>
  </header>
  <div class="Botonera-Superior-Derecha">
    <a class="Btn Btn-Primario" href="{{ route((config('automobile.resource_name') ?: 'automobiles').'.create') }}"><i class="Icono Icono-Izquierda fa fa-plus"></i>Nuevo Automotor</a>
  </div>
  @include('automobile::automobiles.partials.pluma-index-table')
  <div class="Botonera-Inferior-Derecha">
    <a class="Btn Btn-Primario" href="{{ route((config('automobile.resource_name') ?: 'automobiles').'.create') }}"><i class="Icono Icono-Izquierda fa fa-plus"></i>Nuevo Automotor</a>
  </div>
@endsection
