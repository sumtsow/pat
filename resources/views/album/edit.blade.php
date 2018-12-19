@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/gallery">{{__('gallery.list')}}</a></li>
    <li class="breadcrumb-item">{{ $album->__get('dir') }}</li>    
@endsection

@section('content')
<div class="container">
    <h1 class="justify-center">{{ $album->__get('dir') }}</h1>
    <form method="post" action="{{url('gallery/'.$album->__get('dir'))}}">
    {{csrf_field()}}
    {{ method_field('put') }}
    @include('errors')     
    @foreach($album->__get('title') as $locale => $title)        
        <div class="card mb-3">
            <div class="card-header">           
                <h3>{{ __('gallery.title', [], $locale) }} ({{ $locale }})</h3>
            </div>            
            <div class="card-body">           
                <textarea class="form-control" id="{{ $locale }}" name="{{ $locale }}" rows="3">{{ $title }}</textarea>
            </div>
        </div>            
    @endforeach
        <input type="submit" class="btn btn-success" value="{{ __('gallery.save') }}" />
        <input type="button" class="btn btn-warning" value="{{ __('gallery.cancel') }}" name="cancel" onclick="history.back();" />
    </form>     
</div>
@endsection
