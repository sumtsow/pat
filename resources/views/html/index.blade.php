@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/home">{{__('auth.Dashboard')}}</a></li>
<li class="breadcrumb-item">{{ __('admin.HTML admin')}}</li>
@endsection

@section('content')
<div class="container">
    <h1 class="justify-center">{{ __('admin.HTML admin')}}</h1>
    <div class="col-md-9">
        <div class="row"><a href="/html/create" class="btn btn-success float-right my-3" title="{{__('admin.new html')}}">{{__('admin.new html')}}</a></div>
    </div>
    <div class="card-columns">
@foreach($files as $file)
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ pathinfo($file)['filename'] }}">{{ pathinfo($file)['filename'] }}</a>
                <a class="float-right ml-1" title="{{__('gallery.delete')}}" data-toggle="modal" data-target="#Modal_{{ pathinfo($file)['filename'] }}"><span class="badge badge-light badge-pill"><span class="fa fa-trash-alt" aria-hidden="true"></span></span></a>                  
                <a class="float-right" title="{{__('gallery.edit')}}" href="/html/{{ pathinfo($file)['filename'] }}/edit"><span class="badge badge-light badge-pill"><span class="fa fa-edit" aria-hidden="true"></span></span></a>
            </div>
        </div>
<div class="modal" id="Modal_{{ pathinfo($file)['filename'] }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{__('gallery.warning')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>{{__('gallery.completly remove')}} <b>{{ pathinfo($file)['filename'] }}?</b></p>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">{{__('gallery.cancel')}}</button>
            <form action="/html/{{ pathinfo($file)['filename'] }}" method="post">        
                <button type="button" class="btn btn-danger" onclick="this.form.submit();">{{__('gallery.yes')}}</button>
                {{csrf_field()}}
                {{method_field('delete')}}
            </form>
      </div>
    </div>
  </div>
</div>
@endforeach
    </div>
</div>
@endsection
