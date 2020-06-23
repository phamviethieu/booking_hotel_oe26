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
                                <p data-animation="animated fadeInUp delay-1s">{{  config('contacts_hotel.description_' . config('app.locale')) }}</p>
                                <a href=""
                                   class="btn btn-md btn-theme"
                                   data-animation="animated fadeInUp delay-15s">
                                    {{ trans('message.functions.start') }} {{ trans('message.functions.now') }}
                                </a>
                                <a href="#" class="btn btn-md border-btn-theme"
                                   data-animation="animated fadeInUp delay-15s">
                                    {{ trans('message.functions.more') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
