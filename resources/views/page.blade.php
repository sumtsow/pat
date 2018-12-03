@extends('layouts.app')

@section('loginform')
    @include('loginform') 
@endsection

@section('nav')
    @include('nav') 
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">{{$pageTitle}}</li>
@endsection

@section('lang')
    @include('lang') 
@endsection

@section('carousel')
    @include('carousel') 
@endsection

@section('content')
    <?php include($_SERVER['DOCUMENT_ROOT'].$path); ?>
@endsection

