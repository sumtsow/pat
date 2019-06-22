@extends('layouts.app')

@section('content')

<h1>{{ __('admin.search results') }}</h1>

<h3>{{ __('admin.your search', ['row' => $search, 'count' => count($results) ]) }}</h3>

@foreach($results as $result)
<?php $file = new App\Html(app()->getLocale(), pathinfo($result['filename'])['filename']); ?>
<div class="card my-3">
    <div class="card-body">
        <h5 class="card-title">{{ $file->pageTitle }}</h5>
        <a href="{{ pathinfo($result['filename'])['filename'] }}">... {!! $result['string'] !!} ...</a>
     </div>
 </div>
@endforeach


@endsection

