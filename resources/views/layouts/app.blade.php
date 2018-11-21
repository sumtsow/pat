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
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
@yield('scripts')
    <!-- Styles -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="wrapper container">
    <header>{LANGFORM} {BANNER}</header>
    <nav class="navbar navbar-default">
	<ul class="nav navbar-nav">
		<li class="active"><a href="/home/">Home</a></li>
		<li><a href="/about/">About us</a></li>
		<li><a href="/services/">Services</a></li>
		<li><a href="/partners/">Partners</a></li>
		<li><a href="/customers/">Customers</a></li>
		<li><a href="/projects/">Projects</a></li>
		<li><a href="/careers/">Careers</a></li>
		<li><a href="/contact/">Contact</a></li>			
	</ul>
    </nav>
    <div class="heading">
	<h1>Pat Phy Dep Site</h1>
    </div>
    <div class="row">
        <aside class="col-md-3">
        <ul class="list-group submenu">
                <li class="list-group-item active"><a href="/">Home</a></li>
		<li class="list-group-item"><a href="/about/">About us</a></li>
		<li class="list-group-item"><a href="/services/">Services</a></li>
		<li class="list-group-item"><a href="/partners/">Partners</a></li>
		<li class="list-group-item"><a href="/customers/">Customers</a></li>
		<li class="list-group-item"><a href="/projects/">Projects</a></li>
		<li class="list-group-item"><a href="/careers/">Careers</a></li>
		<li class="list-group-item"><a href="/contact/">Contact</a></li>
        </ul>
        </aside>
        <section class="col-md-7">
            @yield('content')
        </section>
    </div>
    <footer>
        {COUNTERS} <span>&copy; {{ config('app.title.ru')}}, 2015-{{date('Y')}} </span>
    </footer>    
</div>
</body>
</html>
