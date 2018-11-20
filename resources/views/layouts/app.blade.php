<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.title.ru')}}</title>
    <meta name="keywords" content="{{config('app.keywords')}}" />
    <meta name="description" content="{{config('app.description')}}" />
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="favicon.ico">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
@yield('scripts')
    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div id="tpad"></div>
    <div id="top" class="{LANG}">{LANGFORM}</div>
    {BANNER}
	<div id="left">
            <nav id="nav">{NAVIGATION}</nav> <!-- end nav -->
            <div id="loginform">{LOGINFORM}</div> <!-- end nav -->
	</div>
    <div id="crumbs">{CRUMBS}</div> <!-- end crumbs -->
    <main class="py-4">
        @yield('content')
    </main>
</div><!-- end app -->         
<div id="foo">{COUNTERS} <span>&copy; {{ config('app.title.ru')}}, 2015-{{date('Y')}} </span></div><!-- end foo -->
</body>
</html>
