@extends('admin.layouts.master')
@section('title', trans('message.title.user') . ' ' . $user->name)
@section('content')
    <div class="content-wrapper">
        <div class="container pt-5">

            <div class="card col-6 offset-md-3 ">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-muted" contenteditable="false">
                            <strong> {{ trans('message.userInfo') }} : {{ $user->name }}
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
                                {{ trans('message.fullName') }}:
                            </strong></span>
                            {{ $user->name }}
                        </li>
                        <li class="list-group-item ">
                        <span class="pull-left">
                            <strong class=""> {{ trans('message.join') }}: </strong>
                        </span>
                            {{ date('d-m-Y', strtotime($user->created_at)) }}
                        </li>
                        <li class="list-group-item ">
                            <span class="pull-left">
                                <strong class="">{{ trans('message.account') }}: </strong>
                            </span> {{ $user->username }}
                        </li>
                        <li class="list-group-item">
                            <span class="pull-left">
                                <strong class="">{{ trans('message.email') }}: </strong>
                            </span> {{ $user->email }}
                        </li>
                        <li class="list-group-item">
                            <span class="pull-left">
                                <strong class="">{{ trans('message.phoneNumber') }}: </strong>
                            </span> {{ $user->phone_number }}
                        </li>
                        <li class="list-group-item">
                            <span class="pull-left">
                                <strong class="">{{ trans('message.role') }}: </strong>
                            </span>
                            <span class="badge badge-success"> {{ $user->role->role }}</span></li>

                        <li class="list-group-item text-right">
                            <form name="delete" method="POST" action="{{ route('users.destroy', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                    {{ trans('message.delete') }}
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
