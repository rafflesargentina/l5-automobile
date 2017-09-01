@php $module = config('automobile.module') ?: 'automobile'; @endphp
<html>
<head>
@include($module.'::partials.meta')
<title>{{ env('APP_NAME') ?: 'Automobile' }} - @yield('title')</title>
{!! Html::style('http://pluma.rafflesargentina.com/css/pluma.min.css') !!}
{!! Html::style('http://pluma-select2.rafflesargentina.com/css/pluma-select2.min.css') !!}
{!! Html::script('http://pluma.rafflesargentina.com/js/pluma.min.js') !!}
</head>
<body class="Con-Header-Compacto-Fixed">
@include($module.'::partials.header')
@yield('sidebar')
<div class="Wrapper-Main Alto-Completo">
  <main class="Main Main-Con-Sidebar Apretable">
    @include($module.'::partials.flash')
    @include($module.'::partials.breadcrum')
    <div class="Contenido-Main">
      @yield('content')
    </div>
  </main>
</div>
@include($module.'::partials.footer')
</body>
</html>
