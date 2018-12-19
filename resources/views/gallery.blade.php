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
                    {{ $album->__get('dir') }}
                    @can('admin', Auth::user())
                    <a class="float-right ml-1" title="{{__('gallery.delete')}}" data-toggle="modal" data-target="#Modal_{{ $album->__get('dir') }}"><span class="badge badge-primary badge-pill"><span class="fa fa-trash-alt" aria-hidden="true"></span></span></a>                    
                    <a class="float-right" title="{{__('gallery.edit')}}" href="/gallery/{{ $album->__get('dir') }}/edit"><span class="badge badge-primary badge-pill"><span class="fa fa-edit" aria-hidden="true"></span></span></a>
<div class="modal" id="Modal_{{ $album->__get('dir') }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{__('gallery.warning')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>{{__('gallery.completly remove')}} <b>{{ $album->__get('dir') }}?</b></p>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">{{__('gallery.cancel')}}</button>
<form action="/gallery/{{ $album->__get('dir') }}" method="post">        
    <button type="button" class="btn btn-danger" onclick="this.form.submit();">{{__('gallery.yes')}}</button>
{{csrf_field()}}
{{method_field('delete')}}
</form>
      </div>
    </div>
  </div>
</div>
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
    <a class="float-left btn btn-success mt-3" href="/album/create">{{ __('gallery.new album') }}</a>
</div>
@endsection
