@php $show_route = (config('automobile.resource_name') ?: 'automobiels').'.show'; @endphp
@php $edit_route = (config('automobile.resource_name') ?: 'automobiles').'.edit'; @endphp
@php $destroy_route = (config('automobile.resource_name') ?: 'automobiles').'.destroy'; @endphp

<section class="Caja-Tabla">
  <table class="Tabla Responsive Tabla-Hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Origen</th>
        <th>Id. tipo fábrica</th>
        <th>Marca</th>
        <th>Tipo</th>
        <th>Modelo</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($items as $item)
      <tr>
        <td>{{ $item->present()->id }}</td>
        <td>{{ $item->present()->source }}</td>
        <td>{{ $item->present()->factory_type_id }}</td>
        <td>{{ $item->present()->brand }}</td>
        <td>{{ $item->present()->type }}</td>
        <td>{{ $item->present()->model }}</td>
        <td>
          {!! Form::open(['method' => 'DELETE', 'route' => [$destroy_route, $item->{$item->getRouteKeyName()}], 'class' => 'Formulario-Tabla']) !!}
            <a class="Btn Btn-Tabla" href="{{ route($show_route, $item->{$item->getRouteKeyName()}) }}">
              <i class="Icono Icono-Izquierda fa fa-eye"></i>
            </a>
            <a class="Btn Btn-Tabla" href="{{ route($edit_route, $item->{$item->getRouteKeyName()}) }}">
              <i class="Icono Icono-Izquierda fa fa-pencil-square-o"></i>
            </a>
            <button type="submit" class="Btn-Tabla"><i class="Icono Icono-Izquierda fa fa-trash"></i></button>
          {!! Form::close() !!}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
<div class="Wrapper-Paginacion">
  <span class="Cuenta-Resultados"><i class="Icono Icono-Izquierda fa fa-search"></i>Viendo {{ $items->count() }} de {{ $items->total() }} resultados.</span>
  {!! $items->appends($appliedFiltersAndSorters)->render() !!}
</div>
