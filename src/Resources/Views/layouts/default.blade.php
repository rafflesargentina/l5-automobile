<html>
<head>
@include('automobile::partials.meta')
<title>{{ env('APP_NAME') ?: 'L5 Argentine City' }} - @yield('title')</title>
{!! Html::style('http://pluma.rafflesargentina.com/css/pluma.min.css') !!}
</head>
<body class="Con-Header-Compacto-Fixed">
@include('automobile::partials.header')
<div class="Wrapper-Main Alto-Completo">
  <main class="Main">
    @include('automobile::partials.flash')
    <div class="Contenido-Main">
      @yield('content')
    </div>
  </main>
</div>
</body>
</html>
