@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">{{$pageTitle}}</li>
@endsection

@section('content')
    <?php include($path); ?>
@endsection

