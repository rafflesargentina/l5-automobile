<header class="Header Header-Compacto Header-Negativo Fixed">
  <a class="Logo">{{ env('APP_NAME') ?: 'L5 Automobile' }}</a>
  <nav class="Menu-Header Primario">
    <ul class="Lista-Menu-Header">
      <li class="Item-Menu-Header">
        <a href="{{ route((config('automobile.resource_name') ?: 'automobiles').'.index') }}">
          <span class="Medalla Medalla-Default">{{ $automobilesCount }}</span> Automotores
        </a>
      </li>
      <li class="Item-Menu-Header"><a href="{{ route((config('automobile.resource_name') ?: 'automobiles').'.create') }}">Nuevo Automotor</a></li>
      <li class="Item-Menu-Header">
        <a href="{{ route((config('automobile.brand_resource_name') ?: 'automobile-brands').'.index') }}">
          <span class="Medalla Medalla-Default">{{ $automobileBrandsCount }}</span> Marcas
        </a>
      </li>
      <li class="Item-Menu-Header">
        <a href="{{ route((config('automobile.type_resource_name') ?: 'automobile-types').'.index') }}">
          <span class="Medalla Medalla-Default">{{ $automobileTypesCount }}</span> Tipos
        </a>
      </li>
    </ul>
  </nav>
</header>
