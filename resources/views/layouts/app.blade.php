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
    @yield('styles')
</head>
<body>
 
<div class="container-fluid">
    <div class="card w-100 my-3" id="logo">
        <img class="card-image rounded w-100" src="/img/title_{{app()->getLocale()}}.jpg" />
        <div class="d-flex align-items-end card-img-overlay p-0 justify-content-end">
        @include('loginform')
        </div>
    </div>
    <div class="row mx-1">
        @include('carousel') 
    </div>
    <div class="row p-3 border-1">    
        <div class="card col-sm-3 border-0 p-0 bg-transparent">
            <nav class="nav rounded" id="nav">
            <?php include('storage/html/'.app()->getLocale().'/navigation.html'); ?>
            </nav>
        </div>
        <div class="card col-sm-9 border-0 pl-3 pr-0 bg-transparent">
            <div class="card-header m-0 p-0 border-0" id="breadcrumbs">
                <nav class="nav my-0 py-0" area-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">{{ __('pagination.Main')}}</a></li>
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
@can('admin', Auth::user())
<!-- Yandex.Metrika informer -->
<a href="https://metrika.yandex.ru/stat/?id=24685271&amp;from=informer"
target="_blank" rel="nofollow"><img src="//mc.yandex.ru/informer/24685271/1_1_78E8DAFF_58C8BAFF_0_pageviews"
style="width:80px; height:15px; border:0; margin: 5px 0 0 0" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры)" onclick="try{Ya.Metrika.informer({i:this,id:24685271,lang:'ru'});return false}catch(e){}"/></a>
<!-- /Yandex.Metrika informer -->
@endcan
                        <small>{{ config('app.title.'.app()->getLocale())}}, 2015-{{date('Y')}}</small>
                    </div>
                </div>
            </div>
        </div>
    </footer>    
</div>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
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
