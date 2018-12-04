@extends('layouts.app')

@section('loginform')
    @include('loginform') 
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
    <div class="row">
        <div class="w-100">
        <h2>{{ __('gallery.list') }}</h2>  
        @foreach($albums as $album)
            <div class="card my-3">
                <div class="card-body">
                    <a href="{{ $album->__get('path') }}">{{ $album->__get('title')[app()->getLocale()] }}</a>
                    <span class="badge badge-success badge-pill">{{ $album->getPhotosNum() }}</span>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
@endsection
