@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="justify-center">{{ __('admin.Guestbook')}}</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal">{{ __('post.add') }}</button>
@foreach($posts as $post)
<!-- Comment # {{$post->id}} -->
    <div class="card w-100 mt-3 border-light rounded shadow">
        <div class="card-header">
            {{ $post->user->name }} - {{ \App\Post::mbt_ucfirst(strftime("%A, %e %B %Y %H:%M", $post->created_at->getTimestamp())) }}
<a class="float-right ml-1" title="{{ __('gallery.delete')}}" data-toggle="modal" data-target="#Modal_{{ $post->id }}"><span class="badge badge-light badge-pill"><span class="fa fa-trash-alt" aria-hidden="true"></span></span></a>
<a class="float-right ml-1" title="@if($post->visible) {{ __('post.visible')}} @else {{ __('post.invisible')}} @endif" href="/blog/check/{{ $post->id }}"><span class="badge badge-light badge-pill"><span class="fa @if($post->visible) fa-eye @else fa-eye-slash @endif" aria-hidden="true"></span></span></a>
        </div>
        <div class="card-body">{{ $post->text }}</div>
    </div>
<div class="modal fade" id="Modal_{{ $post->id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{__('gallery.warning')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>{{__('gallery.completly remove')}} {{ __('post.message') }} <b>{{ $post->id }}</b> {{ __('post.from') }}<b> {{ \App\User::find($post->id_user)->name }} </b>?</p>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">{{__('gallery.cancel')}}</button>
<form id="del{{ $post->id }}" action="/blog/{{ $post->id }}" method="post">        
    <button type="button" class="btn btn-danger" onclick="this.form.submit();">{{__('gallery.yes')}}</button>
{{csrf_field()}}
{{method_field('delete')}}
</form>
      </div>
    </div>
  </div>
</div>
@endforeach
    <!-- End of comments -->
    <div class="flex-center">{{ $posts->links() }}</div>
</div>
<div class="modal fade" id="Modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{__('post.add')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="post" action="/blog" method="post">
            {{csrf_field()}}            
            <textarea class="w-100" name="text"></textarea>
        </form>          
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">{{__('gallery.cancel')}}</button>
          <button form="post" type="button" class="btn btn-danger" onclick="this.form.submit();">{{__('gallery.yes')}}</button>
      </div>
    </div>
  </div>
</div>
@endsection
