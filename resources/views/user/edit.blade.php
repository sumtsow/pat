@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/home">{{__('auth.Dashboard')}}</a></li>
    <li class="breadcrumb-item"><a href="/users">{{ __('admin.user admin')}}</a></li>  
    <li class="breadcrumb-item">{{ __('admin.User') }} &laquo;{{$user->name}}&raquo;</li> 
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md w-100">
            <div class="card">
                @include('errors')                
                <div class="card-header">
                    <h1>{{ __('admin.User') }} &laquo;{{$user->name}}&raquo;</h1>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <form action="{{url('users/'.$user->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <label>{{ __('auth.Name') }}</label> 
                            <input value="{{$user->name}}" type="text" label="{{ __('auth.Name') }}" name="name" id="user-name" class="form-control" />
                            <label>{{ __('auth.E-Mail Address') }}</label>
                            <input value="{{$user->email}}" type="email" label="{{ __('auth.E-Mail Address') }}" name="email" id="user-email" class="form-control" />
                            <label>{{ __('admin.Role') }}</label>
                            <select class="form-control" name="role" label="{{ __('admin.Role') }}" id="user-role" class="form-control">
                                <option value="admin" @if($user->role=='admin') selected="selected" @endif>admin</option>
                                <option value="user" @if($user->role=='user') selected="selected" @endif>user</option>
                                
                            </select>
                            <br />
                            <button type="submit" class="btn btn-success">{{ __('gallery.save') }}</button>
                            <a href="{{ route('users') }}" class="btn btn-danger">{{ __('gallery.cancel') }}</a>
                        </form>     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection