@php $layout = 'automobile::layouts.default'; @endphp
@php $title = 'Nuevo registro'; @endphp
@extends($layout)
@section('title', $title)
@section('content')
  <header class="Titulo-Pagina">
    <h1>Automotor <small>{{ $title }}</small></h1>
  </header>
  @include('automobile::automobiles.partials.pluma-create-form')
@endsection
