@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item text-truncate" style="max-width: 30em;">{{ $file->__get('pageTitle') }}</li>
@endsection

@section('content')
    {!! $file->__get('content') !!}
@endsection

