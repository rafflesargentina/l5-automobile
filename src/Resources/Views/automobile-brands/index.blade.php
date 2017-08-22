@php $layout = 'automobile::layouts.default'; @endphp
@php $title = 'Listado'; @endphp
@extends($layout)
@section('title', $title)
@section('content')
  <header class="Titulo-Pagina">
    <h1>Marcas <small>{{ $title }}</small></h1>
  </header>
  <div class="Botonera-Superior-Derecha">
  </div>
  @include('automobile::automobile-brands.partials.pluma-index-table')
  <div class="Botonera-Inferior-Derecha">
  </div>
@endsection
