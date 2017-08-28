@php $layout = 'automobile::layouts.default'; @endphp
@php $title = 'Listado'; @endphp
@php $index_route = (config('automobile.resource_name') ?: 'automobiles').'.index'; @endphp
@extends($layout)
@section('title', $title)
@section('content')
  <header class="Titulo-Pagina">
    <h1>Automotores <small>{{ $title }}</small></h1>
    <ul class="Lista-Inline">
    @foreach(RafflesArgentina\Automobile\Filters\AutomobileFilters::getAppliedFilters() as $filter)
    <li><span class="Medalla Medalla-Primario">{{ $filter }}</span></li>
    @endforeach
    </ul>
  </header>
  <div class="Botonera-Superior-Derecha">
    <a class="Btn Btn-Primario" href="{{ route((config('automobile.resource_name') ?: 'automobiles').'.create') }}"><i class="Icono Icono-Izquierda fa fa-plus"></i>Nuevo Automotor</a>
    {!! Form::open(['method' => 'GET', 'route' => $index_route]) !!}
      <div class="Grupo-Formulario">
        {!! Form::text('term', null, ['placeholder' => 'Marca, tipo o modelo...', 'class' => 'Con-Icono-Izquierda']) !!}
        <i class="Icono-Control-Izquierda fa fa-search"></i>
      </div>
    {!! Form::close() !!}
  </div>
  @include('automobile::automobiles.partials.pluma-index-table')
  <div class="Botonera-Inferior-Derecha">
    <a class="Btn Btn-Primario" href="{{ route((config('automobile.resource_name') ?: 'automobiles').'.create') }}"><i class="Icono Icono-Izquierda fa fa-plus"></i>Nuevo Automotor</a>
  </div>
@endsection
