<section class="Caja-Tabla">
  <table class="Tabla Responsive Tabla-Hover">
    <thead>
      <tr>
        <th>Identificación</th>
        <th>Origen</th>
        <th>Fábrica</th>
        <th>Tipo de fábrica</th>
        <th>Nombre</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($items as $item)
      <tr>
        <td>{{ $item->present()->brand_id }}</td>
        <td>{{ $item->present()->source }}</td>
        <td>{{ $item->present()->factory }}</td>
        <td>{{ $item->present()->factory_type }}</td>
        <td>{{ $item->present()->brand }}</td>
        <td>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
<div class="Wrapper-Paginacion">
  <span class="Cuenta-Resultados"><i class="Icono Icono-Izquierda fa fa-search"></i>Viendo {{ $items->count() }} de {{ $items->total() }} resultados.</span>
  {!! $items->render() !!}
</div>
