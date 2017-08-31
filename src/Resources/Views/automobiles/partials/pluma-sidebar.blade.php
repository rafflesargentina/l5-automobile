@php $index_route = (config('automobile.resource_name') ?: 'automobiles').'.index'; @endphp

<aside id="sidebarFilters" class="Sidebar Sidebar-Default Sidebar-Empujona Absolute">
  {!! Form::open(['class' => 'Formulario-Filtros', 'method' => 'GET', 'route' => $index_route]) !!}
    <div class="Contenido-Sidebar" style="margin-top:1rem;">
      <div class="Cuerpo-Panel">
        <h3><small>Orden de resultados</small></h3>
        @foreach($appliedSorters as $k => $v)
          <span class="Medalla Medalla-Primario">{{ $v }}</span> <span class="Medalla Medalla-Default">{{ $order }}</span>
        @endforeach
        <div class="Grupo-Formulario {{ $errors->has('orderBy') ? 'El--con-error' : '' }}">
          {!! Form::label('orderBy', 'Ordenar por') !!}
          {!! Form::select('orderBy', $orderByKeys, $orderBy, ['placeholder' => 'Ordenar por', 'id' => 's2OrderBy']) !!}
          @if($errors->has('orderBy'))
          <span class="Mensaje-Validacion">
            <strong>{{ $errors->first('orderBy') }}</strong>
          </span>
          @endif
        </div>
        <div class="Grupo-Formulario {{ $errors->has('order') ? 'El--con-error' : '' }}">
          {!! Form::label('order', 'Dirección') !!}
          {!! Form::select('order', ['asc' => 'Ascendente', 'desc' => 'Descendente'], $order, ['placeholder' => 'Dirección', 'id' => 's2Order']) !!}
          @if($errors->has('order'))
          <span class="Mensaje-Validacion">
            <strong>{{ $errors->first('order') }}</strong>
          </span>
          @endif
        </div>
        <div class="Grupo-Formulario {{ $errors->has('show') ? 'El--con-error' : '' }}">
          {!! Form::label('show', 'Mostrar') !!}
          {!! Form::select('show', ['25' => '25 ', '50' => '50', '100' => '100', '200' => '200', '400' => '400'], Request::get('show') ?: '25', ['placeholder' => 'Mostrar', 'id' => 's2Show']) !!}
          @if($errors->has('show'))
          <span class="Mensaje-Validacion">
            <strong>{{ $errors->first('show') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <section class="Cuerpo-Panel">
        <h3><small>Filtros de búsqueda</small></h3>
        @foreach($appliedFilters as $k => $v)
          <span class="Medalla Medalla-Primario">{{ $v }}</span>
        @endforeach
        <div class="Grupo-Formulario {{ $errors->has('factory_type_id') ? 'El--con-error' : '' }}">
          {!! Form::label('factory_type_id', 'Ident. tipo de fábrica') !!}
          {!! Form::select('factory_type_id', isset($factoryTypeIds) ? $factoryTypeIds : [], null, ['placeholder' => 'Ident. tipo de fábrica', 'id' => 's2FactoryTypeId']) !!}
          @if($errors->has('factory_type_id'))
          <span class="Mensaje-Validacion">
            <strong>{{ $errors->first('factory_type_id') }}</strong>
          </span>
          @endif
        </div>
        <div class="Grupo-Formulario {{ $errors->has('brand') ? 'El--con-error' : '' }}">
          {!! Form::label('brand', 'Marcas') !!}
          {!! Form::select('brand', isset($brands) ? $brands : [], null, ['placeholder' => 'Marca', 'id' => 's2Brand']) !!}
          @if($errors->has('brand'))
          <span class="Mensaje-Validacion">
            <strong>{{ $errors->first('brand') }}</strong>
          </span>
          @endif
        </div>
        <div class="Grupo-Formulario {{ $errors->has('type') ? 'El--con-error' : '' }}">
          {!! Form::label('type', 'Tipo') !!}
          {!! Form::select('type', isset($types) ? $types : [], null, ['placeholder' => 'Tipo', 'id' => 's2Type']) !!}
          @if($errors->has('type'))
          <span class="Mensaje-Validacion">
            <strong>{{ $errors->first('type') }}</strong>
          </span>
          @endif
        </div>
        <div class="Grupo-Formulario {{ $errors->has('model') ? 'El--con-error' : '' }}">
          {!! Form::label('model', 'Modelo') !!}
          {!! Form::select('model', isset($models) ? $models : [], null, ['placeholder' => 'Modelo', 'id' => 's2Model']) !!}
          @if($errors->has('model'))
          <span class="Mensaje-Validacion">
            <strong>{{ $errors->first('model') }}</strong>
          </span>
          @endif
        </div>
        <div class="Fila">
          <div class="Grupo-Formulario Col-Tablet-6">
            {!! Form::submit('Aplicar filtros', ['class' => 'Btn-Primario Btn-Bloque']) !!}
          </div>
          <div class="Grupo-Formulario Col-Tablet-6">
            <a class="Btn Btn-Default" href="{{ route($index_route) }}">Quitar Filtros</a>
          </div>
      </div>
    </section>
  {!! Form::close() !!}
</aside>
