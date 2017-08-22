@php $layout = 'automobile::layouts.default'; @endphp
@php $title = 'Actualizar registro'; @endphp
@extends($layout)
@section('title', $title)
@section('content')
  <header class="Titulo-Pagina">
    <h1>{{ $model->id }} <small>{{ $title }}</small></h1>
  </header>
  @include('automobile::automobiles.partials.pluma-edit-form')
@endsection
