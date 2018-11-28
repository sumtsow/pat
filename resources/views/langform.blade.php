<!--
<form method="post" id ="lang_form" action="{{url('/history/setlocale/')}}">
    {{csrf_field()}}
    <input name="lang" type="submit" value="ua" class="btn ua border-0 mr-2 p-1 px-2" title="Українська">
    <input name="lang" type="submit" value="ru" class="btn ru border-0 mr-2 p-1 px-2" title="Русский">
    <input name="lang" type="submit" value="en" class="btn en border-0 p-1 px-2" title="English">
</form>
-->

<a href="{{url()->current().'/setlocale/ua'}}" class="btn ua border-0 mr-2 p-1 px-2">Українська</a>
<a href="{{url()->current().'/setlocale/ru'}}" class="btn ru border-0 mr-2 p-1 px-2">Русский</a>
<a href="{{url()->current().'/setlocale/en'}}" class="btn en border-0 p-1 px-2">English<a/>

