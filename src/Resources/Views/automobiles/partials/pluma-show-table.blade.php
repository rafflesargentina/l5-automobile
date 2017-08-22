<section class="Caja-Tabla">
  <table class="Tabla Responsive Tabla-Hover">
    <thead>
      <tr>
        <th>Año</th>
        <th>Precio</th>
      </tr>
    </thead>
    <tbody>
      @php $years = array_where($model->getAttributes(), function ($v, $k) { return preg_match('/^y/', $k); }); @endphp
      @foreach($years as $year => $price)
      <tr>
        <td>{{ str_replace('y', '', $year) }}</td>
        <td>$ {{ number_format($price,2,',','.') }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
