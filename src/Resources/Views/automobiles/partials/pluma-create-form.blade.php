@php $store_route = (config('automobile.resource_name') ?: 'automobiles').'.store'; @endphp
@php $index_route = (config('automobile.resource_name') ?: 'automobiles').'.index'; @endphp

{!! Form::model($model = new \RafflesArgentina\Automobile\Models\Automobile, ['method' => 'POST', 'route' => $store_route, 'class' => 'Formulario-Horizontal']) !!}
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
        {!! Form::select('source', isset($sources) ? $sources : [], null, ['placeholder' => 'Seleccioná una opción', 'id' =>'s2Source']) !!}
        @if($errors->has('source'))
        <span class="Mensaje-Validacion">{{ $errors->first('source') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('brand') ? 'El--con-error' : '' }}">
      {!! Form::label('brand', 'Marca *', ['class' => 'Grupo-Formulario Col-Tablet-2']) !!}
      <div class="Grupo-Formulario Col-Tablet-8">
        {!! Form::select('brand', isset($brands) ? $brands : [], null, ['placeholder' => 'Seleccioná una marca', 'id' => 's2Brand']) !!}
        @if($errors->has('brand'))
        <span class="Mensaje-Validacion">{{ $errors->first('brand') }}</span>
        @endif
      </div>
    </div>
    <div class="Fila {{ $errors->has('type') ? 'El--con-error' : '' }}">
      {!! Form::label('type', 'Tipo *', ['class' => 'Grupo-Formulario Col-Tablet-2']) !!}
      <div class="Grupo-Formulario Col-Tablet-8">
        {!! Form::select('type', isset($types) ? $types : [], null, ['placeholder' => 'Seleccioná un tipo', 'id' => 's2Type']) !!}
        @if($errors->has('type'))
        <span class="Mensaje-Validacion">{{ $errors->first('type') }}</span>
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
  <section class="Botonera-Inferior-Derecha">
    <button type="submit" class="Btn-Primario"><i class="Icono Icono-Izquierda fa fa-save"></i>Guardar</button>
    <a class="Btn Btn-Default" href="{{ route($index_route) }}"><i class="Icono Icono-Izquierda fa fa-arrow-left"></i>Volver</a>
  </section>
{!! Form::close() !!}
