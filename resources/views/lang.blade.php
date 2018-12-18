@foreach(Config::get('app.locales') as $locale)
<a href="/setlocale/{{ $locale }}" class="btn {{ $locale }} border-0 mr-1 p-1 px-2">{{ $locale }}</a>
@endforeach