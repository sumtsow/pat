@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@endsection

@section('loginform')
    @include('loginform') 
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">{{__('gallery.list')}}</li>
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
    <h1 class="text-center">{{ __('gallery.list') }}</h1>    
    <div class="card-columns">
        @foreach($albums as $album)
            <div class="card border-light shadow">
                <div class="card-header">
                    /{{ pathinfo($album->__get('path'))['filename'] }}
                    @can('view', $album)
                    <?php $poss = $user->can('view, App\Album') ?? 'empty'; ?>
                    <a class="float-right ml-1" title="{{__('gallery.delete')}}" href="/gallery/{{ $album->__get('dir') }}"><span class="badge badge-primary badge-pill"><span class="fa fa-trash-alt" aria-hidden="true"></span></span></a>                    
                    <a class="float-right" title="{{__('gallery.edit')}}" href="/gallery/{{ $album->__get('dir') }}/edit"><span class="badge badge-primary badge-pill"><span class="fa fa-edit" aria-hidden="true"></span></span></a>
                    @endcan
                </div>                
                <div class="card-body">
                    <a href="/gallery/{{ $album->__get('dir') }}">{{ $album->__get('title')[app()->getLocale()] }}</a>
                </div>
                <div class="card-footer align-middle text-right">
                    <span class="badge badge-success badge-pill">{{ $album->getPhotosNum() }} {{ __('gallery.photos')}}</span>
                </div>               
            </div>
        @endforeach
    </div>
</div>
@endsection
