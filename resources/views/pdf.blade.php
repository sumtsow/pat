@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/home">{{__('auth.Dashboard')}}</a></li>
<li class="breadcrumb-item">{{ __('admin.pdf list')}}</li>
@endsection

@section('content')

<div class="container">
    <h1 class="text-center">{{ __('admin.pdf list') }}</h1>  
    @include('errors')  
    <form action="/pdf/create" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <label class="h4">{{ __('admin.new file') }} </label>
        <input type="file" name="pdf" id="photo" />
        <input type="submit" class="btn btn-success my-3" value="{{ __('admin.upload') }}" />
    </form>
    @foreach($pdffiles as $key => $file)

    <div class="card-columns">    
        <div class="card mt-3">
            <div class="card-body h5">
                <a target="_blank" href="/storage/pdf/{{ $file->__get('basename') }}">{{ $file->__get('basename') }}</a>
                <a class="float-right" title="{{__('gallery.delete')}}" data-toggle="modal" data-target="#Modal_{{ $key }}"><span class="badge badge-light badge-pill"><span class="fa fa-trash-alt" aria-hidden="true"></span></span></a>           
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="flex-center">{{ $pdffiles->links() }}</div>
@endsection

