@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/home">{{__('auth.Dashboard')}}</a></li>
<li class="breadcrumb-item"><a href="/html">{{ __('admin.HTML admin')}}</a></li>
<li class="breadcrumb-item">{{ __('admin.new html')}}</li>
@endsection

@section('content')
<div class="container">
    <form method="post" action="{{url('html')}}">
    {{csrf_field()}}
    @include('errors')
    <div class="card mb-3">
        <div class="card-header">
    <h1 class="justify-center">{{ __('admin.new html')}}</h1>            
        </div>
        <div class="card-body">
            <p>{{ __('admin.filename') }}</p>
            <input type="text" class="form-control" name="file" value="newfile" /> 
        </div>
        <div class="card-footer">
        <input type="submit" class="btn btn-success" value="{{ __('gallery.save') }}" />
        <input type="button" class="btn btn-warning" value="{{ __('gallery.cancel') }}" name="cancel" onclick="history.back();" />
        </div>
    </form>     
</div>
@endsection
