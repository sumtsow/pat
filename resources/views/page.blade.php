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

@section('carousel')
    @include('carousel') 
@endsection

@section('content')
    <?php include($path); ?>
@endsection

