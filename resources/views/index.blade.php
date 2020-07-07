@extends('layouts.master')
@section('title', trans('message.home'))
@section('content')
    <div class="banner banner-2">
        <div class="banner-inner">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="{{ asset('bower_components/style_project1/img/banner/banner-slider-3.jpg') }}"
                             alt="banner-slider-3">
                        <div class="carousel-caption banner-slider-inner banner-top-align">
                            <div class="banner-content text-center">
                                <h1 data-animation="animated fadeInDown delay-05s">
                                    {{ trans('message.welcome') }}
                                    <span> {{ $hotel_name }} </span>
                                </h1>
                                <p data-animation="animated fadeInUp delay-1s">
                                    {{  config('contacts_hotel.description_' . config('app.locale')) }}
                                </p>
                                <a href="@if (Auth::check()) {{ route('booking') }} @else {{ route('login') }} @endif"
                                   class="btn btn-md btn-theme"
                                   data-animation="animated fadeInUp delay-15s">
                                    {{ trans('message.functions.start') }} {{ trans('message.functions.now') }}
                                </a>
                                <a href="{{ route('ratings.index') }}" class="btn btn-md border-btn-theme"
                                   data-animation="animated fadeInUp delay-15s">
                                    {{ trans('message.functions.more') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="testimonials-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div id="carouse3-example-generic" class="carousel slide" data-ride="carousel">
                        <h1>{{ trans('message.functions.our_feedback') }}</h1>
                        <div class="carousel-inner" role="listbox">
                            @foreach ($hotel->ratings as $key => $one_rate)
                                <div class="item content clearfix {{ $key == 1 ? 'active' : '' }}">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="avatar">
                                                <img src="{{ asset(config('contacts_hotel.url_avatar_default') . ($one_rate->user->avatar ?? config('contacts_hotel.avatar_user_default'))) }}" class="img-responsive">
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <div class="testimonials-info">
                                                <div class="text">
                                                    <sup>
                                                        <i class="fa fa-quote-left"></i>
                                                    </sup>
                                                    {{ $one_rate->content }}
                                                    <sub>
                                                        <i class="fa fa-quote-right"></i>
                                                    </sub>
                                                </div>
                                                <div class="author-name">
                                                    {{ $one_rate->user->name }}
                                                </div>
                                                <ul class="rating">
                                                    @for ($i = 1; $i <= $one_rate->rate; $i++)
                                                        <li class="text-secondary">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                    @endfor
                                                    @for ($i = 1; $i <= config('contacts_hotel.star_num') - $one_rate->rate; $i++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                    &#40;{{ $one_rate->rate }}/5&#41;
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="left carousel-control" href="#carouse3-example-generic" role="button"
                           data-slide="prev">
                        <span class="slider-mover-left t-slider-l" aria-hidden="true">
                            <i class="fa fa-angle-left"></i>
                        </span>
                            <span class="sr-only">
                                {{ trans('message.functions.previous') }}
                            </span>
                        </a>
                        <a class="right carousel-control" href="#carouse3-example-generic" role="button"
                           data-slide="next">
                        <span class="slider-mover-right t-slider-r" aria-hidden="true">
                            <i class="fa fa-angle-right"></i>
                        </span>
                            <span class="sr-only">
                                {{ trans('message.functions.next') }}
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
