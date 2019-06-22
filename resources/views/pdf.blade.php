@extends('layouts.app')

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
    <div class="card-columns">    
    @foreach($pdffiles as $key => $file)
    <div class="modal" id="Modal_{{ $key }}" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('gallery.warning')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{__('gallery.completly remove')}} <b>{{ $file->__get('basename') }}?</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">{{__('gallery.cancel')}}</button>
                    <form action="/pdf/delete/{{ $file->__get('basename') }}" method="post">        
                    <button type="button" class="btn btn-danger" onclick="this.form.submit();">{{__('gallery.yes')}}</button>
                    {{csrf_field()}}
                    {{method_field('delete')}}
                    </form>
                </div>
            </div>
        </div>
    </div>    
        <div class="card mb-3">
            <div class="card-body">
                <a target="_blank" href="/storage/pdf/{{ $file->__get('basename') }}">{{ $file->__get('basename') }}</a>
                <a class="float-right" title="{{__('gallery.delete')}}" data-toggle="modal" data-target="#Modal_{{ $key }}"><span class="badge badge-light badge-pill"><span class="fa fa-trash-alt" aria-hidden="true"></span></span></a>           
            </div>
        </div>
    @endforeach    
    </div>
</div>
<div class="flex-center">{{ $pdffiles->links() }}</div>
@endsection

