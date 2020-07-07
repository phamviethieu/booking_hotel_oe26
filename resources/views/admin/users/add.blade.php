@extends('admin.layouts.master')
@section('title', trans('message.title.userEdit'))
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
            <section class="content mt-3">
                <form method="POST" action="{{ route('users.store') }}" 
                    data-target="{{ route('users.index') }}" 
                    enctype="multipart/form-data" 
                    class="col-md-8 offset-md-2" 
                    id="add_user"  
                    >
                    @csrf
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="name">
                                {{ trans('message.infor_user.fullname')}}
                            </label>
                            <input type="text" 
                                name="name" 
                                class="form-control" 
                                id="name" 
                                required
                                >
                            <div class="name-error invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="username">
                                {{ trans('message.infor_user.account')}}
                            </label>
                            <input type="text" 
                                name="username" 
                                class="form-control" 
                                id="username" 
                                required
                                >
                            <div class="username-error invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="email">
                                {{ trans('message.infor_user.email')}}
                            </label>
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend3">
                                    @
                                </span>
                            </div>
                            <input type="email" 
                                name="email" 
                                class="form-control" 
                                id="email" 
                                aria-describedby="inputGroupPrepend3" 
                                required
                                >
                            <div class="email-error invalid-feedback">
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="phone_number">
                                {{ trans('message.infor_user.phoneNumber') }}
                            </label>
                            <input type="text" 
                                name="phone_number" 
                                class="form-control" 
                                id="phone_number" 
                                required
                                >
                            <div class="phone_number-error invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="roles">
                                {{ trans('message.infor_user.role')}}
                            </label>
                            <select name="role_id" class="form-control" id="roles" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">
                                        {{ $role->role }}
                                    </option>
                                 @endforeach
                            </select>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-6">
                            <label for="password">
                                {{ trans('message.infor_user.password') }}
                            </label>
                            <input type="password" 
                                name="password" 
                                class="form-control" 
                                id="password" 
                                required>
                            <div class="password-error invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="confirm">
                                {{ trans('message.infor_user.confirm_password') }}
                            </label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="confirm" 
                                required
                                >
                            <div class="confirm-password-error invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="text-right pt-3">
                        <button class="btn btn-primary" type="submit">
                            {{ trans('message.functions.add') }}
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </div>
    @section('script')
        <script src="{{ mix('js/user_add_valid.js') }}"></script>
    @endsection
@endsection
