@extends('admin.layouts.master')
@section('title', trans('message.title.userEdit'))
@section('content')
    <div class="content-wrapper">
        <div class="container pt-5">
            <form name="update" action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card col-6 offset-md-3 ">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-muted" contenteditable="false">
                                <strong> {{ trans('message.userInfo') }}: {{ $user->name }} </strong> &nbsp;
                                <div class="float-right"><a title="{{ trans('message.cancel') }}" href="{{ route('users.show', $user->id) }}">
                                        <i class="far fa-window-close"></i> </a>
                                </div>
                            </li>
                            <li class="list-group-item "><span class="pull-left">
                        <strong class=""> {{ trans('message.fullName') }}:
                            <span class="text-danger">*</span>:</strong>
                        </span>&nbsp;
                                <input class="user-input" type="text" required name="name" value="{{ $user->name }}"
                                >
                            </li>
                            <li class="list-group-item "><span class="pull-left">
                        <strong class="">{{ trans('message.join') }}: </strong></span>
                                {{ date('d-m-Y', strtotime($user->created_at)) }}
                            </li>
                            <li class="list-group-item "><span class="pull-left">
                        <strong class="">
                            {{ trans('message.account') }}
                            <span class="text-danger">*</span>:
                        </strong></span>&nbsp;
                                <input type="text" required class="user-input" name="username" value="{{ $user->username}}"
                                >
                            </li>
                            <li class="list-group-item"><span class="pull-left">
                        <strong class="">
                            {{ trans('message.email') }}
                            <span class="text-danger">*</span>:
                        </strong></span>
                                <input type="email" required class="user-input" name="email" value="{{ $user->email}}">
                            </li>
                            <li class="list-group-item"><span class="pull-left">
                        <strong class="">
                            {{ trans('message.phoneNumber') }}
                            <span class="text-danger">*</span>:
                        </strong></span> &nbsp;
                                <input type="text" required class="user-input" name="phone_number" value="{{ $user->phone_number}}">
                            </li>
                            <li class="list-group-item"><span class="pull-left">
                        <select class="form-control custom-select" name="role_id">
                            @foreach ($roles as $role)
                                <option
                                    value="{{ $role->id }}"
                                    {{ $role->id == $user->role_id ? 'selected' : '' }}
                                >
                                    {{ $role->role }}
                                </option>
                            @endforeach
                        </select>
                            </li>
                            <li class="list-group-item text-right">

                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="far fa-check-circle"></i>
                                    {{ trans('message.update') }}
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
