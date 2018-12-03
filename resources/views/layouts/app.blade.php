<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.title.ru')}}</title>
    <meta name="keywords" content="{{config('app.keywords')}}" />
    <meta name="description" content="{{config('app.description')}}" />
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="favicon.ico">
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    @yield('scripts')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pat.css') }}" rel="stylesheet">    
</head>
<body>
    @yield('loginform') 
<div class="container-fluid">
    <div class="row mx-1 my-3" id="logo">
        <div class="col-sm-12 px-0 mb-0"><img class="w-100 img-fluid rounded" src="/img/title_{{app()->getLocale()}}.jpg" /></div>        
        <div class="col-sm-2 offset-md-10 mb-0" id="lang">@yield('lang')</div>        

    </div>
    <div class="row mx-1">
        @yield('carousel')
    </div>
    <div class="row p-3 border-1">    
        <div class="card col-sm-3 border-0 p-0 bg-transparent">
            <nav class="nav rounded" id="nav">
                <ul class="nav flex-column">
                @yield('nav')
                </ul>
            </nav>
        </div>
        <div class="card col-sm-9 border-0 pl-3 pr-0 bg-transparent">
            <div class="card-header m-0 p-0 border-0" id="breadcrumbs">
                <nav class="nav my-0 py-0" area-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">{{ __('navigation.Main')}}</a></li>
                        @yield('breadcrumb')
                    </ol>
                </nav>
            </div>
            <div class="card-body justify-content-center">
                @yield('content')
            </div>
        </div>
    </div>
    <footer class="footer m-0 px-3">
        <div class="row justify-content-center m-0 p-0">        
            <div class="card w-100 mb-2 border-0 m-0 p-0">
                <div class="card-body m-0 p-0">
                    <div class="row justify-content-center my-0" id="foo">
                        <small>@yield('counters') &copy; {{ config('app.title.'.app()->getLocale())}}, 2015-{{date('Y')}}</small>
                    </div>
                </div>
            </div>
        </div>
    </footer>    
</div>
</body>
</html>
