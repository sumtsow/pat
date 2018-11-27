@extends('layouts.app')

@section('nav')
    @include('nav') 
@endsection

@section('langform')
    @include('langform') 
@endsection

@section('carousel')
    @include('carousel') 
@endsection

@section('content')
    <?php include($_SERVER['DOCUMENT_ROOT'].$path); ?>
@endsection

