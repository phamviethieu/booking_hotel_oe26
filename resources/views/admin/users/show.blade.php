@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="container pt-5">
            <div class="card col-6 offset-md-3 ">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-muted" contenteditable="false">
                            <strong> {{ trans('message.infor_user.info') }} &#58; 
                                {{ $user->name }}
                            </strong> &nbsp;
                            <div class="float-right">
                                <a title="edit profile" href="{{ route('users.edit', $user->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>
                        </li>
                        <li class="list-group-item ">
                        <span class="pull-left">
                            <strong class="">
                                {{ trans('message.infor_user.fullname') }} &#58;
                            </strong></span>
                            {{ $user->name }}
                        </li>
                        <li class="list-group-item ">
                        <span class="pull-left">
                            <strong class=""> 
                                {{ trans('message.infor_user.join') }} &#58; 
                            </strong>
                        </span>
                            {{ date('d-m-Y', strtotime($user->created_at)) }}
                        </li>
                        <li class="list-group-item ">
                            <span class="pull-left">
                                <strong class="">
                                    {{ trans('message.infor_user.account') }} &#58; 
                                </strong>
                            </span> 
                            {{ $user->username }}
                        </li>
                        <li class="list-group-item">
                            <span class="pull-left">
                                <strong class="">
                                    {{ trans('message.infor_user.email') }} &#58; 
                                </strong>
                            </span> {{ $user->email }}
                        </li>
                        <li class="list-group-item">
                            <span class="pull-left">
                                <strong class="">
                                    {{ trans('message.infor_user.phoneNumber') }} &#58; 
                                </strong>
                            </span> 
                            {{ $user->phone_number }}
                        </li>
                        <li class="list-group-item">
                            <span class="pull-left">
                                <strong class="">
                                    {{ trans('message.infor_user.role') }} &#58; 
                                </strong>
                            </span>
                            <span class="badge badge-success"> 
                                {{ $user->role->role }}
                            </span>
                        </li>
                        <li class="list-group-item text-right">
                            <form name="delete" class="formDelete" method="POST" action="{{ route('users.destroy', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm formDelete">
                                    <i class="fas fa-trash"></i>
                                    {{ trans('message.functions.delete') }}
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @section('script')
        @include('admin.layouts.message')
    @endsection 
@endsection
