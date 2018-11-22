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
    <header>{LANGFORM} {BANNER}</header>
    <div class="heading">
	<h1>Pat Phy Dep Site</h1>
    </div>    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
        </ol>
    </nav>
    <div class="row">
        <aside class="col-md-3">
            @yield('nav')
        </aside>
        <section class="col-md-9">
            @yield('content')
        </section>
    </div>
    <footer class="footer">
        <div class="card border-dark">
            <div class="card-body">
                <div class="row justify-content-center">
                    {COUNTERS} &copy; {{ config('app.title.ru')}}, 2015-{{date('Y')}} 
                </div>
            </div>
        </div>
    </footer>    
</div>
</body>
</html>
