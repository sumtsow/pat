@extends('layouts.app')

@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js"></script>  
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css" />  
@endsection

@include('errors')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/gallery">{{__('gallery.list')}}</a></li>
    <li class="breadcrumb-item">{{__('gallery.new album')}}</li> 
@endsection

@section('content')
<div class="container">
    <h1 class="justify-center">{{__('gallery.new album')}}</h1>
    <form method="post" action="{{url('gallery/'.$album->__get('dir'))}}">
    {{csrf_field()}}
    {{ method_field('put') }}
    @include('errors')
    @foreach($locales as $locale)        
        <div class="card mb-3">
            <div class="card-header">           
                <h3>{{ __('gallery.title', [], $locale) }}</h3>
            </div>            
            <div class="card-body">           
                <textarea class="form-control" id="{{ $locale }}" name="{{ $locale }}" rows="3"></textarea>
            </div>
        </div>            
    @endforeach
        <input type="hidden" name="dir" value="{{ $album->__get('dir') }}" />
        <input type="submit" class="btn btn-success" value="{{ __('gallery.save') }}" />
        <input type="button" class="btn btn-warning" value="{{ __('gallery.cancel') }}" name="cancel" onclick="history.back();" />
    </form>     
</div>
@endsection
