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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    @yield('scripts')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">    
        <div class="card border-dark w-100 m-3">
            <div class="card-body p-0">
                <img src="/img/title_ru.jpg" class="img-fluid w-100" alt="Pat Phy Dep Site">
                <header>{LANGFORM}</header>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card border-dark w-100 mr-3 ml-3">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="/img/img01.jpg" alt="Перший слайд">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/img/img02.jpg" alt="Другий слайд">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/img/img03.jpg" alt="Третій слайд">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/img/img04.jpg" alt="Четвертий слайд">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/img/img05.jpg" alt="П'ятий слайд">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/img/img06.jpg" alt="Шостий слайд">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/img/img07.jpg" alt="Сьомий слайд">
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="row p-3">    
        <div class="card col-sm-3 bg-success">
            <nav class="nav">
                @yield('nav')
            </nav>
        </div>
        <div class="card col-sm-9 border-0 pl-3 pr-0">
            <div class="card-header bg-success">
                <nav class="nav" area-label="breadcrumb">
                    <ol class="breadcrumb bg-success">
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
    <footer class="footer">
        <div class="row justify-content-center">        
            <div class="card w-100 text-white bg-success mr-3 mb-3 ml-3 rounded-bottom badge-pill">
                <div class="card-body">
                    <div class="row justify-content-center">   
                        {COUNTERS} &copy; {{ config('app.title.ru')}}, 2015-{{date('Y')}}
                    </div>
                </div>
            </div>
        </div>
    </footer>    
</div>
</body>
</html>
