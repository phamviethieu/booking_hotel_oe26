@extends('layouts.master')
@include('layouts.sub_banner')
@section('content')
    <div class="services-2">

    <div class="container" >
        <div class="row">
            <div class="col-md-6 col-md-offset-3 rating-div">
                @if (!isset($rate))
                <form method="POST" class="ratingForm">
                    <div class="rating1 form-group  text-center">
                        <a class="rating r1" data-index="1" title="Very poor"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                        <a class="rating r2" data-index="2" title="Poor"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                        <a class="rating r3" data-index="3" title="Normal"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                        <a class="rating r4" data-index="4" title="Good"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                        <a class="rating r5" data-index="5" title="Very good"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="content">{{ trans('message.functions.feedback') }}</label>
                            <textarea class="form-control" name="content" required id="content" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group text-right">

                        <input type="submit" class="ratingForm btn btn-primary" value="{{ trans('message.functions.rating') }}">
                    </div>
                </form>
                @else
                    <div class="panel panel-default rate-available">
                        <div class="panel-heading">
                            <div class="rating-user form-group text-center"  data-rate= "{{$rate->rate }}" >
                                <a class="r1" data-index="1" title="Very poor"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                                <a class="r2" data-index="2" title="Poor"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                                <a class="r3" data-index="3" title="Normal"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                                <a class="r4" data-index="4" title="Good"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                                <a class="r5" data-index="5" title="Very good"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">

                            <ul class="list-group">
                                <li class="list-group-item">" {{ $rate->content }} "</li>

                            </ul>
                            <div class="div">
                                <div class="row">
                                    <div class="col-md-9">
                                        {{ trans('message.alert.thank_you_rating') }}
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-secondary" id="edit-rating"> {{ trans('message.functions.edit') . ' ' . trans('message.functions.feedback')}} </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="POST" class="updateRatingForm" data-rate="{{ $rate->rate }}" data-rate-id="{{ $rate->id }}">
                        @csrf
                        @method('PUT')
                        <div class="rating1 form-group text-center">
                            <a class="rating r1" data-index="1" title="Very poor"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                            <a class="rating r2" data-index="2" title="Poor"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                            <a class="rating r3" data-index="3" title="Normal"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                            <a class="rating r4" data-index="4" title="Good"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                            <a class="rating r5" data-index="5" title="Very good"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                        </div>
                        <div class="rating-range text-center">

                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="content">{{ trans('message.functions.feedback') }}</label>
                                <textarea class="form-control" value={{ $rate->content }} name="content" required id="content" rows="5">{{ $rate->content }}</textarea>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <input type="submit" class="updateRatingForm btn btn-primary" value="{{ trans('message.functions.rating') }}">
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    </div>
    <article id = "rating-article"
        data-thanks="{{ trans('message.alert.thank_you_rating') }}"
        data-back="{{ trans('message.functions.back') }}"
    >
    </article>
    @section('script')
        <script src="{{ asset('bower_components/style_project1/js/rating.js') }}"></script>
    @endsection
@endsection
