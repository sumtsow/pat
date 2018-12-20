@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">{{ $file->__get('pageTitle') }}</li>
@endsection

@section('content')
    {!! $file->__get('content') !!}
@endsection

