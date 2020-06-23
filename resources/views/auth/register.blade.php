@extends('auth.master')
@section('title', trans('message.register'))
@section('content')
    <div class="contact-bg overview-bgi">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-content-box">
                        <a href="{{ route('home') }}" class="clearfix alpha-logo">
                            <img src="{{ asset('bower_components/style_project1/img/logos/white-logo.png') }}">
                        </a>
                        <div class="details">
                            <h3>{{ trans('message.auth.register') }}</h3>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" class="input-text" placeholder="{{ trans('message.infor_user.fullname') }}">
                                    @error ('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" class="input-text" placeholder="{{ trans('message.infor_user.account') }}">
                                    @error ('username')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="input-text"
                                           placeholder="{{ trans('message.infor_user.email') }}">
                                    @error ('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="input-text" placeholder="{{ trans('message.auth.password') }}">
                                    @error ('password')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="input-text" placeholder="{{ trans('message.auth.passConfirm') }}">
                                </div>
                                <div class="mb-0">
                                    <button type="submit" class="btn-md btn-theme btn-block">
                                        {{ trans('message.auth.register') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="footer">
                            <span>
                                {{ trans('message.auth.isMember') }}?
                                <a href="{{ route('login') }}">
                                    {{ trans('message.auth.login') }}
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
