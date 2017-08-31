@php $store_route = (config('automobile.refactory_type_id_name') ?: 'automobiles').'.store'; @endphp
@php $index_route = (config('automobile.refactory_type_id_name') ?: 'automobiles').'.index'; @endphp

{!! Form::model($model_id = new \RafflesArgentina\Automobile\Models\Automobile, ['method' => 'POST', 'route' => $store_route, 'class' => 'Formulario-Horizontal']) !!}
  <section>
    <div class="Fila {{ $errors->has('id') ? 'El--con-error' : '' }}">
      {!! Form::label('id', 'Identificación *', ['class' => 'Grupo-Formulario Col-Tablet-2']) !!}
      <div class="Grupo-Formulario Col-Tablet-8">
        {!! Form::text('id', null, ['placeholder' => 'Entre 7 y 8 caracteres alfa-numéricos']) !!}
        @if($errors->has('id'))
        <span class="Mensaje-Validacion">{{ $errors->first('id') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('source') ? 'El--con-error' : '' }}">
      {!! Form::label('source', 'Origen *', ['class' => 'Grupo-Formulario Col-Tablet-2']) !!}
      <div class="Grupo-Formulario Col-Tablet-8">
        {!! Form::select('source', isset($sources) ? $sources : [], null, ['placeholder' => 'Origen', 'id' => 's2Source']) !!}
        @if($errors->has('source'))
        <span class="Mensaje-Validacion">{{ $errors->first('source') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('factory_type_id') ? 'El--con-error' : '' }}">
      {!! Form::label('factory_type_id', 'Ident. tipo de fábrica *', ['class' => 'Grupo-Formulario Col-Tablet-2']) !!}
      <div class="Grupo-Formulario Col-Tablet-8">
        {!! Form::select('factory_type_id', isset($factoryTypeIds) ? $factoryTypeIds : [], null, ['placeholder' => 'Ident. de tipo de fábrica', 'id' =>'s2FactoryTypeId']) !!}
        @if($errors->has('factory_type_id'))
        <span class="Mensaje-Validacion">{{ $errors->first('factory_type_id') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('brand') ? 'El--con-error' : '' }}">
      {!! Form::label('brand', 'Marca *', ['class' => 'Grupo-Formulario Col-Tablet-2']) !!}
      <div class="Grupo-Formulario Col-Tablet-8">
        {!! Form::select('brand', isset($brands) ? $brands : [], null, ['placeholder' => 'Marca', 'id' => 's2Brand']) !!}
        @if($errors->has('brand'))
        <span class="Mensaje-Validacion">{{ $errors->first('brand') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('type') ? 'El--con-error' : '' }}">
      {!! Form::label('type', 'Tipo *', ['class' => 'Grupo-Formulario Col-Tablet-2']) !!}
      <div class="Grupo-Formulario Col-Tablet-8">
        {!! Form::select('type', isset($types) ? $types : [], null, ['placeholder' => 'Tipo', 'id' => 's2Type']) !!}
        @if($errors->has('type'))
        <span class="Mensaje-Validacion">{{ $errors->first('type') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('model_id') ? 'El--con-error' : '' }}">
      {!! Form::label('model_id', 'Ident. del modelo *', ['class' => 'Grupo-Formulario Col-Tablet-2']) !!}
      <div class="Grupo-Formulario Col-Tablet-8">
        {!! Form::text('model_id', null) !!}
        @if($errors->has('model_id'))
        <span class="Mensaje-Validacion">{{ $errors->first('model_id') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('model') ? 'El--con-error' : '' }}">
      {!! Form::label('model', 'Modelo*', ['class' => 'Grupo-Formulario Col-Tablet-2']) !!}
      <div class="Grupo-Formulario Col-Tablet-8">
        {!! Form::text('model', null) !!}
        @if($errors->has('model'))
        <span class="Mensaje-Validacion">{{ $errors->first('model') }}</span>
        @endif
      </div>
    </div>
  </section>
  <section>
    <div class="Titulo-Pagina">
      <h3 class="Texto-Centrado">Precios</h3>
    </div>
    @foreach($years as $year)
    @php $name = 'y'.$year; @endphp
    <div class="Fila {{ $errors->has($name) ? 'El--con-error' : '' }}">
      {!! Form::label($name, 'Año '.$year, ['class' => 'Col-Tablet-2']) !!}
      <div class="Grupo-Formulario Col-Tablet-8">
        {!! Form::text($name, null) !!}
        @if($errors->has($name))
        <span class="Mensaje-Validacion">{{ $errors->first($name) }}</span>
        @endif
      </div>
    </div>
    @endforeach
  </section>
  <section class="Botonera-Inferior-Derecha">
    <button type="submit" class="Btn-Primario"><i class="Icono Icono-Izquierda fa fa-save"></i>Guardar</button>
    <a class="Btn Btn-Default" href="{{ route($index_route) }}"><i class="Icono Icono-Izquierda fa fa-arrow-left"></i>Volver</a>
  </section>
{!! Form::close() !!}
