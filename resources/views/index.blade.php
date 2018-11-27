@extends('layouts.app')

@section('scripts')
    <script src="{{ asset('js/swfobject.js') }}" type="text/javascript" language="javascript"></script>
    <script src="{{ asset('js/swf.js') }}" type="text/javascript" language="javascript"></script>
@endsection

@section('langform')
    @include('langform') 
@endsection

@section('carousel')
    @include('carousel') 
@endsection

@section('nav')
    @include('nav') 
@endsection

@section('content')
<!-- <div id="myglobe">
    <h1>Alternative content</h1>
    <a href="http://www.adobe.com/go/getflashplayer">
        <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
    </a>
</div>-->
@endsection

