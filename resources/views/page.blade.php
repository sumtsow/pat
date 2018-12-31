@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item text-truncate" style="max-width: 30em;">{{ $file->__get('pageTitle') }}</li>
@endsection

@section('content')
    @can('admin', Auth::user())
    <a href="/html/{{ $file->__get('filename')}}/edit" class="btn btn-danger float-right" title="{{__('gallery.edit')}}" >{{__('gallery.edit')}}</a>
    @endcan
    <br />
    {!! $file->__get('content') !!}
@endsection

