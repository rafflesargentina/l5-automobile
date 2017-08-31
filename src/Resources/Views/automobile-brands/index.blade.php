@php $layout = 'automobile::layouts.default'; @endphp
@php $title = 'Listado'; @endphp
@php $index_route = (config('automobile.brand_resource_name') ?: 'automobile-brands').'.index'; @endphp
@php $module = config('automobile.module') ?: 'automobile'; @endphp
@extends($layout)
@section('title', $title)
@section('content')
  <header class="Titulo-Pagina">
    <h1>Marcas <small>{{ $title }}</small></h1>
  </header>
  <div class="Botonera-Superior-Derecha">
    {!! Form::open(['method' => 'GET', 'route' => $index_route]) !!}
      <div class="Grupo-Formulario">
        {!! Form::text('term', null, ['placeholder' => 'Marca o ident. de marca', 'class' => 'Con-Icono-Izquierda']) !!}
        <i class="Icono-Control-Izquierda fa fa-search"></i>
      </div>
    {!! Form::close() !!}
  </div>
  @include($module.'::automobile-brands.partials.pluma-index-table')
  <div class="Botonera-Inferior-Derecha">
  </div>
@endsection
