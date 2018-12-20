@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="justify-center">{{ __('admin.html files')}}</h1>
    <div class="card-columns">
        @foreach($files as $file)
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ pathinfo($file)['filename'] }}">{{ pathinfo($file)['filename'] }}</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
