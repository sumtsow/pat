@extends('layouts.app')

@section('breadcrumb')
    @can('admin', Auth::user())
    <li class="breadcrumb-item"><a href="/home">{{__('auth.Dashboard')}}</a></li>
    @endcan
    <li class="breadcrumb-item">{{ __('admin.change my password') }}</li> 
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md w-100">
            <div class="card">
                @include('errors')                
                <div class="card-header">
                    <h1>{{ __('admin.change my password') }}</h1>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <form action="{{url('passwd')}}" method="post">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <label>{{ __('auth.Password') }}</label> 
                            <input type="password" label="{{ __('auth.Password') }}" name="password" id="user-password" class="form-control" />
                            <label>{{ __('auth.Confirm Password') }}</label>
                            <input type="password"label="{{ __('auth.Confirm Password') }}" name="password_confirmation" id="user-password_confirmation" class="form-control" />   
                            <br />
                            <button type="submit" class="btn btn-success">{{ __('gallery.save') }}</button>
                            <a href="{{ URL::previous() }}" class="btn btn-danger">{{ __('gallery.cancel') }}</a>
                        </form>     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection