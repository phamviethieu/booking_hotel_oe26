@extends('auth.master')
@section('title', trans('message.auth.login'))
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
                            <h3>{{ trans('message.auth.login') }}</h3>
                            <form action="{{ route('login' )}}" method="POST">
                                @csrf
                                @if ($errors)
                                    @foreach ($errors->all() as $error)
                                        <div class="alert-danger">{{ $error }}</div>
                                    @endforeach
                                @endif
                                <br>
                                <div class="form-group">
                                    <input type="email" name="email" required value="{{ old('email') }}" class="input-text" placeholder="{{ trans('message.infor_user.email') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" required value="{{ old('password') }}" name="password" class="input-text" placeholder="Password">
                                </div>
                                <div class="checkbox">
                                    <div class="ez-checkbox pull-left">
                                        <label>
                                            <input type="checkbox" name="remember" class="ez-hide">
                                                {{ trans('message.functions.save') }} {{ trans("message.auth.login") }}
                                        </label>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="mb-0">
                                    <button type="submit" class="btn-md btn-theme btn-login btn-block">
                                        {{ trans('message.auth.login') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="footer">
                            <span>
                                {{ trans('message.auth.notMember') }}?
                                <a href="{{ route('register') }}">
                                    {{ trans('message.auth.register') }}
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
