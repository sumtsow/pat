@extends('layouts.app')

@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js"></script>  
@endsection

@section('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css" />@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/gallery">{{__('gallery.list')}}</a></li>
    <li class="breadcrumb-item text-truncate">{{ $album->__get('title')[app()->getLocale()] }}</li>    
@endsection

@section('content')
<div class="container">
    <h1 class="justify-center">{{ $album->__get('title')[app()->getLocale()] }} ({{ $album->getPhotosNum() }} {{ __('gallery.photos')}})</h1>
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
                {{ $photo->__get('basename') }}
                <a class="float-right" title="{{__('gallery.delete')}}" data-toggle="modal" data-target="#Modal_{{ $photo->__get('filename') }}"><span class="badge badge-light badge-pill"><span class="fa fa-trash-alt" aria-hidden="true"></span></span></a>                    
                <div class="modal" id="Modal_{{ $photo->__get('filename') }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-dark">
                                <h5 class="modal-title">{{__('gallery.warning')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-dark">
                                <p>{{__('gallery.completly remove')}} <b>{{ $photo->__get('basename') }}?</b></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('gallery.cancel')}}</button>
                                <form action="/gallery/{{ $album->__get('dir') }}/photo/{{ $photo->__get('basename') }}" method="post">        
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
            <a data-fancybox="gallery" href="{{ $photo->__get('path') }}">
                <img class="card-img-top rounded" src="{{ $photo->__get('path') }}" alt="{{ $photo->__get('filename') }}" />
            </a>
            @can('admin', Auth::user())
            <div class="card-footer">
                {{ date('d.m.Y h:m:s',$photo->__get('lastModified')) }}, <br/>
                {{ $photo->__get('size') }} kb
            </div>
            @endcan
        </div>
        @endforeach
    </div>
</div>
@endsection