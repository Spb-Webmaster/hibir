<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{{ csrf_token() }}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite([
    'resources/css/app.css',
    'resources/js/app.js',
    ])
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <title>@yield('title', config('seo.seo.title'))</title>
    <meta name="description" content="@yield('description',  config('seo.seo.description'))"/>
    <meta name="keywords" content="@yield('keywords',  config('seo.seo.keywords'))"/>
</head>
<body>
<nav id="slide-menu">
    <ul>
        <li class=""><a href="">Координационные советы</a></li>
        <li class=""><a href="">Межрелигиозная деятельность</a></li>
        <li class=""><a href="">Межрелигиозный совет России</a></li>
        <li class=""><a href="">Электронная библиoтека</a></li>
        <li class=""><a href="">Видеоконференции</a></li>
        <li class=""><a href="">Благотворительность</a></li>
        <li class=""><a href="">Волонтерская деятельность</a></li>
        <li class=""><a href="">Медиатека</a></li>

    </ul>
</nav>
    <div id="content" class="content_ ">



        <x-message.message/>
        <x-message.message_error/>
        @include('include.header', ['route' => route_name()]) {{--{{ 'Для стиля главной' }}--}}
        @yield('content')
    </div><!--.content_-->

@include('include.footer')




</body>
</html>

