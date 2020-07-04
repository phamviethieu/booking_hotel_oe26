@extends('admin.layouts.master')
@section('title', trans('message.title.userList'))

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>
                                {{ trans('message.infor_user.user') }}
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">
                                    {{ trans('message.home') }}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{ trans('message.infor_user.user') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ trans('message.infor_user.user') }}
                        </h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    {{ trans('message.infor_user.avatar') }}
                                </th>
                                <th>
                                    {{ trans('message.infor_user.account') }}
                                </th>
                                <th>
                                    {{ trans('message.infor_user.fullname') }}
                                </th>
                                <th>
                                    {{ trans('message.infor_user.email') }}
                                </th>
                                <th>
                                    {{ trans('message.infor_user.phoneNumber') }}
                                </th>
                                <th>
                                    {{ trans('message.infor_user.role') }}
                                </th>
                                <th>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <img alt="{{ trans('message.infor_user.avatar') }}" class="table-avatar"
                                                        src="{{ asset(config('contacts_hotel.url_avatar_default')
                                                            .
                                                            ($user->avatar ?? config('contacts_hotel.avatar_user_default'))) }}">
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <a>
                                                {{ $user->username }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->phone_number }}
                                        </td>
                                        <td>
                                            <span class="badge badge-success">
                                                {{ $user->role->role }}
                                            </span>
                                        </td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-primary btn-sm" href="{{ route('users.show', $user->id) }}">
                                                <i class="far fa-eye"></i>
                                                {{ trans('message.functions.view') }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a class="btn btn-primary mt-2" href="{{ route('users.create') }}">{{ trans('message.functions.add') }}</a>
                </div>
            </section>
        </div>
    </div>
    @section ('script')
        <article
            id="delete"
            data-title="{{  trans('message.alert.sure') }}"
            data-text="{{ trans('message.alert.delete_user') }}"
            data-confirm="{{ trans('message.alert.continue') }}"
            data-cancel="{{ trans('message.alert.close') }}"
        >
        </article>
        @include('admin.layouts.message')
    @endsection
@endsection
