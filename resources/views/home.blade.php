@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item">{{__('auth.Dashboard')}}</li>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg w-100">
            <div class="card">
                <h4 class="card-header">{{ __('auth.Dashboard') }}</h4>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/users"><h4>{{ __('admin.user admin') }}</h4></a>
                    <a href="html"><h4>{{ __('admin.HTML admin') }}</h4></a>
                    <a href="pdf/index"><h4>{{ __('admin.PDF pages admin') }}</h4></a>
                    <a href="navbar"><h4>{{ __('admin.navbar admin') }}</h4></a>
                    <a href="me"><h4>{{ __('admin.change my password') }}</h4></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
