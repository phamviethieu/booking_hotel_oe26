@extends('admin.layouts.master')
@section('title', trans('message.title.userList'))

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>{{ trans('message.user') }}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">{{ trans('message.home') }}</a></li>
                                <li class="breadcrumb-item active">{{ trans('message.room') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ trans('message.user') }}</h3>

                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th>
                                    {{ trans('message.index') }}
                                </th>
                                <th>
                                    {{ trans('message.image') }}
                                </th>
                                <th>
                                    {{ trans('message.account') }}
                                </th>
                                <th>
                                    {{ trans('message.fullName') }}
                                </th>
                                <th>
                                    {{ trans('message.email') }}
                                </th>
                                <th>
                                    {{ trans('message.phoneNumber') }}
                                </th>
                                <th>
                                    {{ trans('message.role') }}
                                </th>
                                <th>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <img alt="{{ trans('message.avatar') }}" class="table-avatar"
                                                     src="{{ asset($user->avatar ?? config('contact_hotels.avatar_user_default')) }}">
                                            </li>
                                        </ul>
                                    </td>
                                    <td><a>{{ $user->username }} </a></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone_number }}</td>
                                    <td>
                                        <span class="badge badge-success">{{ $user->role->role }}</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="{{ route('users.show', $user->id) }}">
                                            <i class="far fa-eye"></i>
                                            {{ trans('message.view') }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
