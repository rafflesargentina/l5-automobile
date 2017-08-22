@php $layout = 'automobile::layouts.default'; @endphp
@php $title = 'Nuevo registro'; @endphp
@extends($layout)
@section('title', $title)
@section('content')
  <header class="Titulo-Pagina">
    <h1>Automotor <small>{{ $title }}</small></h1>
  </header>
  <div id="automobileForm">
    @include('automobile::automobiles.partials.pluma-create-form')
  </div>
@endsection
