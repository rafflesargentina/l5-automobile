@php $layout = 'automobile::layouts.default'; @endphp
@php $title = 'Actualizar registro'; @endphp
@php $module = config('automobile.module') ?: 'automobile'); @endphp
@extends($layout)
@section('title', $title)
@section('content')
  <header class="Titulo-Pagina">
    <h1>{{ $model->id }} <small>{{ $title }}</small></h1>
  </header>
  <div id="automobileForm">
    @include($module.'::automobiles.partials.pluma-edit-form')
  </div>
@endsection
