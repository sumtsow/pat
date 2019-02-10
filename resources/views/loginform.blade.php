<nav class="navbar navbar-collapse dropdown bg-transparent align-self-end">
    <div class="container mr-0 mb-0 dropright">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="{{ __('Toggle navigation') }}" aria-haspopup="true" data-offset="10,20">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('auth.login') }}</a></li>
                <li class="nav-item">
                    @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">{{ __('auth.register') }}</a>
                    @endif
                </li>
                    @else
                <li class="nav-item dropdown"><a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }} <span class="caret"></span></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @can('admin', Auth::user())
                        <a class="dropdown-item" href="{{ url('home') }}">{{ __('auth.Dashboard') }}</a>
                        @endcan
                        @cannot('admin', Auth::user())
                        @auth
                        <a class="dropdown-item" href="{{ url('me') }}">{{ __('admin.change my password') }}</a>
                        @endauth
                        @endcannot
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('auth.Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>                                    
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<div class="align-self-end">
   <ul class="navbar-nav pr-1" id="lang">
@foreach(config('app.locales') as $locale)
        <li class="nav-item mx-1"><a href="/setlocale/{{ $locale }}" class="btn text-dark {{ $locale }} border-0">{{ $locale }}</a></li>
@endforeach
   </ul>
</div>
