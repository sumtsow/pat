@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="justify-center">{{ __('admin.new html')}}</h1>
    <form method="post" action="{{url('html')}}">
    {{csrf_field()}}
    @include('errors')
    <div class="card mb-3">
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
