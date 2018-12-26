@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="justify-center">{{ __('navigation.Guestbook')}}</h1>
    @foreach($posts as $post)
    <div class="card w-100 mt-3 border-light rounded shadow">
        <div class="card-header bg-dark text-light">{{ $post->user->name }} - {{ \App\Post::my_mb_ucfirst(strftime("%A, %e %B %Y %H:%M", $post->created_at->getTimestamp())) }}</div>
        <div class="card-body">{{ $post->text }}</div>
    </div>
    @endforeach
    <div class="flex-center">{{ $posts->links() }}</div>
</div>
@endsection