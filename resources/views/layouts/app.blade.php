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
<div class="container-fluid">
    <div class="row mx-1 my-3" id="logo">@yield('langform')</div>
    <div class="row mx-1">
        <div id="carouselExampleSlidesOnly" class="carousel w-100 slide border-dark" data-ride="carousel">
            <div class="carousel-inner" id="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="/img/carousel/img01.jpg" alt="Перший слайд">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/img/carousel/img02.jpg" alt="Другий слайд">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/img/carousel/img03.jpg" alt="Третій слайд">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="/img/carousel/img04.jpg" alt="Четвертий слайд">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/img/carousel/img05.jpg" alt="П'ятий слайд">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/img/carousel/img06.jpg" alt="Шостий слайд">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/img/carousel/img07.jpg" alt="Сьомий слайд">
                </div>
             </div>
        </div>
    </div>
    <div class="row p-3  border-1">    
        <div class="card col-sm-3 border-0 p-0">
            <nav class="nav" id="nav">
                @yield('nav')
            </nav>
        </div>
        <div class="card col-sm-9 border-0 pl-3 pr-0 bg-transparent">
            <div class="card-header m-0 p-0 border-0" id="breadcrumbs">
                <nav class="nav my-0 py-0" area-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        @yield('breadcrumb')
                    </ol>
                </nav>
            </div>
            <div class="card-body">
                @yield('content')
            </div>
        </div>
    </div>
    <footer class="footer m-0 px-3">
        <div class="row justify-content-center m-0 p-0">        
            <div class="card w-100 mb-0 border-0 m-0 p-0">
                <div class="card-body m-0 p-0">
                    <div class="row justify-content-center my-0" id="foo">
                        @yield('counters') &copy; {{ config('app.title.ru')}}, 2015-{{date('Y')}}
                    </div>
                </div>
            </div>
        </div>
    </footer>    
</div>
</body>
</html>
