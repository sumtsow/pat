@extends('layouts.app')

@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js"></script>  
@endsection

@section('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css" />@endsection

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
    @can('admin', Auth::user())
    @include('errors')  
    <form action="/photo/create" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <label>{{ __('gallery.new photo') }}</label>
        <input type="hidden" name="dir" id="dir" value="{{ $album->__get('dir') }}"/>
        <input type="file" name="photo" id="photo" />
        <input type="submit" class="btn btn-success my-3" value="{{ __('gallery.new photo') }}" />
    </form>
    @endcan
    <div class="card-columns">
        @foreach($photos as $photo)
        <div class="card border-light shadow">
            @can('admin', Auth::user())
            <div class="card-header">
                {{ pathinfo($photo)['basename'] }}
                <a class="float-right" title="{{__('gallery.delete')}}" data-toggle="modal" data-target="#Modal_{{ pathinfo($photo)['filename'] }}"><span class="badge badge-primary badge-pill"><span class="fa fa-times" aria-hidden="true"></span></span></a>                    
                <div class="modal" id="Modal_{{ pathinfo($photo)['filename'] }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{__('gallery.warning')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>{{__('gallery.completly remove')}} <b>{{ pathinfo($photo)['basename'] }}?</b></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">{{__('gallery.cancel')}}</button>
                                <form action="/gallery/{{ $album->__get('dir') }}/photo/{{ pathinfo($photo)['basename'] }}" method="post">        
                                <button type="button" class="btn btn-danger" onclick="this.form.submit();">{{__('gallery.yes')}}</button>
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
            <a data-fancybox="gallery" href="/storage/img/gallery/{{ $album->__get('dir') }}/{{ pathinfo($photo)['basename'] }}">
                <img class="card-img-top rounded" src="/storage/img/gallery/{{ $album->__get('dir') }}/{{ pathinfo($photo)['basename'] }}" alt="{{ pathinfo($photo)['filename'] }}" />
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection