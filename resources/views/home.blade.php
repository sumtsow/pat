@extends('layouts.app')

@section('loginform')
    @include('loginform') 
@endsection

@section('nav')
    @include('nav') 
@endsection

@section('lang')
    @include('lang') 
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header">{{ __('auth.Dashboard') }}</h4>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('auth.You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
