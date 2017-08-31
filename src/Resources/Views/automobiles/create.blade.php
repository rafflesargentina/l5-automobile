@php $layout = 'automobile::layouts.default'; @endphp
@php $title = 'Nuevo registro'; @endphp
@php $module = config('automobile.module') ?: 'automobile'); @endphp
@extends($layout)
@section('title', $title)
@section('content')
  <header class="Titulo-Pagina">
    <h1>Automotor <small>{{ $title }}</small></h1>
  </header>
  <div id="automobileForm">
    @include($module.'::automobiles.partials.pluma-create-form')
  </div>
@endsection
