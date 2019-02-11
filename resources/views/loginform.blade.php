<div class="loginform px-2 mb-3">
<!-- Authentication Links -->
@guest
    <a class="d-inline-block float-left yellow" href="{{ route('login') }}">{{ __('auth.login') }}</a>
    @if (Route::has('register'))
    <a class="d-inline-block float-right yellow" href="{{ route('register') }}">{{ __('auth.register') }}</a>
    @endif
    @else
    <a class="d-inline-block float-left dropdown-toggle yellow" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }} <span class="caret"></span></a>
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
@endguest
</div>
