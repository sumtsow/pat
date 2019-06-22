@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="justify-center">{{ __('admin.Guestbook')}}</h1>
    @auth
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal">{{ __('post.add') }}</button>
    @endauth
    @foreach($posts as $post)
    <div class="card w-100 mt-3 border-light rounded shadow">
        <div class="card-header">
            {{ $post->user->name }} - {{ \App\Post::mbt_ucfirst(strftime("%A, %e %B %Y %H:%M", $post->created_at->getTimestamp())) }}
        </div>
        <div class="card-body">{{ $post->text }}</div>
    </div>
    @endforeach
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