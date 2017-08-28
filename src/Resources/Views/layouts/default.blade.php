<html>
<head>
@include('automobile::partials.meta')
<title>{{ env('APP_NAME') ?: 'Automobile' }} - @yield('title')</title>
{!! Html::style('http://pluma.rafflesargentina.com/css/pluma.min.css') !!}
{!! Html::style('http://pluma-select2.rafflesargentina.com/css/pluma-select2.min.css') !!}
<script src="{{ asset('/js/automobile.js') }}"></script>
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
@include('automobile::partials.footer')
</body>
</html>
