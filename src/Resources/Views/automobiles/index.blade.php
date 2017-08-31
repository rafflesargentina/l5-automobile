@php $layout = 'automobile::layouts.default'; @endphp
@php $title = 'Listado'; @endphp
@php $index_route = (config('automobile.resource_name') ?: 'automobiles').'.index'; @endphp
@php $module = config('automobile.module') ?: 'automobile'; @endphp
@extends($layout)
@section('title', $title)
@section('sidebar')
  @include($module.'::automobiles.partials.pluma-sidebar')
@endsection
@section('content')
  <header class="Titulo-Pagina">
    <h1>Automotores <small>{{ $title }}</small></h1>
    @include($module.'::partials.applied-filters-and-sorters')
  </header>
  <div class="Botonera-Superior-Derecha">
    <a class="Btn Btn-Redondo Btn-Primario" href="{{ route((config('automobile.resource_name') ?: 'automobiles').'.create') }}">
        <i class="Icono fa fa-plus"></i>
    </a>
    {!! Form::button('<i class="Icono fa fa-filter"></i>', ['type' => 'button', 'class' => 'Btn-Redondo Btn-Default Btn-Sidebar', 'data-sidebar' => 'sidebarFilters']) !!}
    {!! Form::open(['method' => 'GET', 'route' => $index_route]) !!}
      <div class="Grupo-Formulario">
        {!! Form::text('term', null, ['placeholder' => 'Marca, tipo o modelo...', 'class' => 'Con-Icono-Izquierda']) !!}
        <i class="Icono-Control-Izquierda fa fa-search"></i>
      </div>
    {!! Form::close() !!}
  </div>
  @include($module.'::automobiles.partials.pluma-index-table')
  <div class="Botonera-Inferior-Derecha">
    <a class="Btn Btn-Primario" href="{{ route((config('automobile.resource_name') ?: 'automobiles').'.create') }}"><i class="Icono Icono-Izquierda fa fa-plus"></i>Nuevo Automotor</a>
  </div>
@endsection
