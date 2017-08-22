@php $layout = 'automobile::layouts.default'; @endphp
@php $title = 'Precios vigentes'; @endphp
@extends($layout)
@section('title', $title)
@section('content')
  <header class="Titulo-Pagina">
    <h1>{{ $model->present()->brand }} {{ $model->present()->model }} {{ $model->present()->type }} ({{ $model->present()->source }})<br>
    <small>{{ $title }}</small></h1>
  </header>
  @include('automobile::automobiles.partials.pluma-show-table')
  <div class="Botonera-Inferior-Derecha">
    <a href="{{ route((config('automobile.resource_name') ?: 'automobiles').'.index') }}" class="Btn Btn-Default">
      <i class="Icono Icono-Izquierda fa fa-arrow-left"></i>Volver
    </a>
  </div>
@endsection
