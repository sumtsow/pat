@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/home">{{__('auth.Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{ __('admin.user admin')}}</li>    
@endsection

@section('content')
<div class="container">
    <h1 class="justify-center">{{ __('admin.user admin')}}</h1>
    <div class="table-responsive">
    <table class="table bg-white table-striped">
        <thead class="thead-pat text-center">
            <tr>
                <th scope="col">{{ __('admin.id')}}</th>
                <th scope="col">{{ __('auth.Name')}}</th>
                <th scope="col">{{ __('auth.E-Mail Address')}}</th>
                <th scope="col">{{ __('auth.Confirmed')}}</th>                
                <th scope="col">{{ __('admin.Role')}}</th>
                <th scope="col" colspan="2">{{ __('admin.action')}}</th>              
            </tr>
        </thead>
        <tbody>
@foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td><a href="mailto://{{ $user->email }}">{{ $user->email }}</a></td>
                <td>
                    <form id="switch-form" action="{{ url('/users/switchstate/'.$user->id) }}">
                        @csrf
                        <input type="checkbox" @if($user->email_verified_at) checked="checked" @endif onClick="this.form.submit();" />
                    </form>
                </td>
                <td @if($user->role =='admin') class="text-danger" @endif>{{ $user->role }}</td>
                <td><a class="float-right" title="{{__('gallery.edit')}}" href="/users/{{ $user->id }}"><span class="badge badge-light badge-pill"><span class="fa fa-edit" aria-hidden="true"></span></span></a></td>
                <td><a class="ml-1" title="{{__('gallery.delete')}}" data-toggle="modal" data-target="#Modal_{{ $user->id }}"><span class="badge badge-light badge-pill"><span class="fa fa-trash-alt" aria-hidden="true"></span></span></a></td>                  
            

<div class="modal" id="Modal_{{ $user->id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{__('gallery.warning')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>{{__('gallery.completly remove')}} <b>{{ $user->name }}?</b></p>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">{{__('gallery.cancel')}}</button>
            <form action="/users/{{ $user->id }}" method="post">        
                <button type="button" class="btn btn-danger" onclick="this.form.submit();">{{__('gallery.yes')}}</button>
                {{csrf_field()}}
                {{method_field('delete')}}
            </form>
      </div>
    </div>
  </div>
</div>
</tr>        
@endforeach
        </tbody>
    </table>
    </div>
</div>
<div class="flex-center">{{ $users->links() }}</div>
@endsection
