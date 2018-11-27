@extends('layouts.app')
@section('nav')
    @include('nav') 
@endsection
@section('content')
    <?php include($_SERVER['DOCUMENT_ROOT'].$path); ?>
@endsection

