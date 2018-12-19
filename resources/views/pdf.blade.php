@extends('layouts.app')

@section('scripts')
    <script src="{{ asset('js/swfobject.js') }}" type="text/javascript" language="javascript"></script>
    <script src="{{ asset('js/swf.js') }}" type="text/javascript" language="javascript"></script>
@endsection

@section('loginform')
    @include('loginform') 
@endsection

@section('carousel')
    @include('carousel') 
@endsection

@section('nav')
    @include('nav') 
@endsection

@section('content')
<div class="container">
    <h1 class="text-center">{{ __('pdf.list') }}</h1>  
    @include('errors')  
    <form action="/pdf/create" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <label>{{ __('pdf.new file') }}</label>
        <input type="file" name="pdf" id="photo" />
        <input type="submit" class="btn btn-success my-3" value="{{ __('gallery.new file') }}" />
    </form>
    @foreach($pdffiles as $file)
    <div class="card mt-3">
        <div class="card-body">
            {{ $file->__get('basename') }}
        </div>
    </div>
    @endforeach
</div>
@endsection

