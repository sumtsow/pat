@extends('layouts.app')

@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js"></script>  
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css" />  
@endsection

@section('loginform')
    @include('loginform') 
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/gallery">{{__('gallery.list')}}</a></li>
    <li class="breadcrumb-item">{{ $album->__get('dir') }}</li>    
@endsection

@section('nav')
    @include('nav') 
@endsection

@section('lang')
    @include('lang') 
@endsection

@section('carousel')
    @include('carousel') 
@endsection

@section('content')
<div class="container">
    <h1 class="justify-center">{{ $album->__get('title')[app()->getLocale()] }}</h1>     
    <div class="card-columns">
        @foreach($photos as $photo)
        <div class="card border-light shadow">
            <a data-fancybox="gallery" href="/storage/img/gallery/{{ $album->__get('dir') }}/{{ pathinfo($photo)['basename'] }}">
                <img class="card-img-top rounded" src="/storage/img/gallery/{{ $album->__get('dir') }}/{{ pathinfo($photo)['basename'] }}" alt="{{ pathinfo($photo)['filename'] }}" />
            </a>
            <div class="card-body">
                {{ pathinfo($photo)['basename'] }}
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
