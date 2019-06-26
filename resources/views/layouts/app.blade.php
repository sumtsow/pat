<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.title.uk')}}</title>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pat.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
<div class="container">
    <div class="col-sm-1"></div>
    <div class="container-fluid">
        <div class="card mx-1 my-3 border-dark">
            <img src="{{ url('/img/title_'.app()->getLocale().'.jpg') }}" class="card-img rounded" alt="title">
            <div class="card-img-overlay p-0">
                <a href="{{ route('index') }}" class="card-text d-block h-100 float-left m-0" style="width: 11%">&nbsp;</a>
                <a href="http://nuph.edu.ua/" target="_blank" class="card-text d-block h-100 float-right m-0" style="width: 11%">&nbsp;</a>
            </div>
        </div>
    <div class="row mx-1">
        @include('carousel') 
    </div>
    <div class="row p-3 border-1">    
        <div class="card col-sm-3 border-0 p-0 bg-transparent">
            <nav id="nav" class="nav rounded navbar navbar-expand-md mb-3">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
    <span class="navbar-toggler-icon text-light"></span>
  </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
            <?php include('storage/html/'.app()->getLocale().'/navigation.html'); ?>
            </div>
            </nav>
            @include('loginform')
        </div>
        <div class="card col-9 border-0 pl-3 pr-0 bg-transparent">
            <div class="card-header d-inline-flex  m-0 p-1 border-0" id="breadcrumbs" style="min-width: 18rem;">
                <div class="col d-none d-xs-none d-sm-none d-md-block d-lg-block d-xl-block">
                <nav class="nav my-0 py-0 d-inline">
                    <ol class="breadcrumb m-0 text-nowrap " style="flex-wrap: nowrap; max-width: 26em;">
                        <li class="breadcrumb-item"><a href="/">{{ __('pagination.Main')}}</a></li>
                        @yield('breadcrumb')
                    </ol>
                </nav>
                </div>
                <div class="col-auto d-flex align-items-center">
                <form method="post" class="form-inline justify-content-end" action="/search" id="search">
                    @csrf
                    <input class="form-control mr-sm-2" type="search" placeholder="{{ __('admin.search') }}" aria-label="Search" name="search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                </form>
                </div>
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
@can('admin', Auth::user())
<!-- Yandex.Metrika informer -->
<a href="https://metrika.yandex.ru/stat/?id=24685271&amp;from=informer"
target="_blank" rel="nofollow"><img src="//mc.yandex.ru/informer/24685271/1_1_78E8DAFF_58C8BAFF_0_pageviews"
style="width:80px; height:15px; border:0; margin: -8px 10px 0 0" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры)" onclick="try{Ya.Metrika.informer({i:this,id:24685271,lang:'ru'});return false}catch(e){}"/></a>
<!-- /Yandex.Metrika informer -->
@endcan
                        <span class="align-middle"><small>{{ config('app.title.'.app()->getLocale())}}, 2015-{{date('Y')}}</small></span>
                        <a href="https://www.facebook.com/profile.php?id=100037358588358" target="_blank" label="facebook"><img class="float-right ml-3" width="32px" height="32px" src="/img/facebook.png" alt="facebook" /></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <div class="col-sm-1"></div> 
</div>
<!-- Yandex.Metrika counter -->
<script>
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter24685271 = new Ya.Metrika({id:24685271,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/24685271" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!-- GoogleAnalytics counter -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-101124778-1', 'auto');
  ga('send', 'pageview');
</script>
<!-- /GoogleAnalytics counter -->
</body>
</html>
