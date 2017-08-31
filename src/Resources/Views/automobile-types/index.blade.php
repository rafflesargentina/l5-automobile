@php $layout = 'automobile::layouts.default'; @endphp
@php $title = 'Listado'; @endphp
@php $index_route = (config('automobile-types.resource_name') ?: 'automobile-types').'.index'; @endphp
@php $module = config('automobile.module') ?: 'automobile'; @endphp
@extends($layout)
@section('title', $title)
@section('content')
  <header class="Titulo-Pagina">
    <h1>Tipos <small>{{ $title }}</small></h1>
  </header>
  <div class="Botonera-Superior-Derecha">
    {!! Form::open(['method' => 'GET', 'route' => $index_route]) !!}
      <div class="Grupo-Formulario">
        {!! Form::text('term', null, ['placeholder' => 'Tipo o ident. de tipo', 'class' => 'Con-Icono-Izquierda']) !!}
        <i class="Icono-Control-Izquierda fa fa-search"></i>
      </div>
    {!! Form::close() !!}
  </div>
  @include($module.'::automobile-types.partials.pluma-index-table')
  <div class="Botonera-Inferior-Derecha">
  </div>
@endsection
