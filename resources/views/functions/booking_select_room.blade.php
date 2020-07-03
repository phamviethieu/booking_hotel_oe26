@extends('layouts.master')
@section('content')
    @include('layouts.sub_banner')
    <div class="booking-flow content-area-10">
        <div class="container">
            <section>
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="{{ trans('message.booking.selectRoom') }}"
                                   data-original-title="{{ trans('message.booking.selectRoom') }}" aria-expanded="false">
                                    <span class="round-tab">
                                        <i class="fa fa-folder-o"></i>
                                    </span>
                                </a>
                                <h3 class="booking-heading">
                                    {{ trans('message.booking.selectRoom') }}
                                </h3>
                            </li>
                            <li role="presentation">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="{{ trans('message.booking.info') }}"
                                   data-original-title="{{ trans('message.booking.info') }}" aria-expanded="true">
                                    <span class="round-tab">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </a>
                                <h3 class="booking-heading">
                                    {{ trans('message.booking.info') }}
                                </h3>
                            </li>
                            <li role="presentation">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="{{ trans('message.booking.deposit') }}"
                                   data-original-title="{{ trans('message.booking.deposit') }}">
                                    <span class="round-tab">
                                        <i class="fa fa-cc"></i>
                                    </span>
                                </a>
                                <h3 class="booking-heading">
                                    {{ trans('message.booking.deposit') }}
                                </h3>
                            </li>
                            <li role="presentation">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="{{ trans('message.booking.complete') }}"
                                   data-original-title="{{ trans('message.booking.complete') }}">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-ok"></i>
                                    </span>
                                </a>
                                <h3 class="booking-heading">
                                    {{ trans('message.booking.complete') }}
                                </h3>
                            </li>
                        </ul>
                    </div>
                    <form id="contact_form" action="{{ route('select_room') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="search-area-box-2 search-booking-box bg-grey">
                                            <div class="search-contents">
                                                <div class="search-your-rooms">
                                                    <h3 class="hidden-xs hidden-sm">
                                                        {{ trans('message.booking.booking') }}
                                                    </h3>
                                                    <h2 class="hidden-xs hidden-sm">
                                                        {{ trans('message.room') }}
                                                        <span>
                                                            {{ trans('message.functions.now') }}
                                                        </span>
                                                    </h2>
                                                    <h2 class="hidden-lg hidden-md">
                                                        {{ trans('message.booking.booking') }}
                                                        {{ trans('message.room') }}
                                                        <span>
                                                            {{ trans('message.functions.now') }}
                                                        </span>
                                                    </h2>
                                                </div>
                                                <div class="search-your-details">
                                                    <div class="form-group">
                                                        <label for="checkin">{{ trans('message.booking.checkin') }}</label>
                                                        <div class='input-group date' id='datetimepicker6'>
                                                            <input id="checkin" type='datetime' required
                                                                   name="time_check_in"
                                                                   class="btn-default form-control"/>
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    @if (Session::has('checkin_err'))
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ Session::get('checkin_err') }}
                                                        </div>
                                                    @endif
                                                    <div class="form-group">
                                                        <label for="checkout">
                                                            {{ trans('message.booking.checkout') }}
                                                        </label>
                                                        <div class='input-group date' id='datetimepicker7'>
                                                            <input type='datetime' id="checkout" required
                                                                name="time_check_out"
                                                                class=" btn-default form-control"/>
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar">
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="type"> {{ trans('message.room') }} </label>
                                                        <select class="selectpicker search-fields form-control-2"
                                                            name="type_id" id="type">
                                                            @foreach ($types as $type)
                                                                <option value="{{ $type->id }}">
                                                                    {{ $type->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="num_room">
                                                            {{ trans('message.functions.num_rooms') }}
                                                        </label>
                                                        <input type="number" min="1" required class="btn-default" id="num_room" name="number_of_rooms">

                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="search-button btn-theme">
                                                            {{ trans('message.booking.booking') }}
                                                            {{ trans('message.room') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h3 class="booking-heading-2 black-color">
                                                </h3>
                                            </div>
                                            @foreach($types as $type)
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="hotel-box">
                                                        <div class="header clearfix">
                                                            <img src=" {{ asset(config('contacts_hotel.url_room_default') . ($type->images->first()->image ?? config('contacts_hotel.image_room_default'))) }}" alt="img-2" class="img-responsive">
                                                        </div>
                                                        <div class="detail clearfix">
                                                            <div class="pr">
                                                                {{ round($type->price) . ' ' . config('contacts_hotel.currency') }}
                                                                <sub>&#47; {{ trans('message.anHour') }}</sub>
                                                            </div>
                                                            <h3>
                                                                <a href="">{{ $type->name }}</a>
                                                            </h3>
                                                            <h5 class="location">
                                                                <i class="fa fa-bed" aria-hidden="true"></i>
                                                                {{ $type->num_bed . ' ' . trans('message.num_bed') }}
                                                                <i class="fa fa-users"></i>
                                                                {{ $type->max_people . ' ' . trans('message.max_people') }}
                                                            </h5>
                                                            <br>
                                                            <a class="btn btn-sm btn-theme"
                                                               href="{{ route('rooms.show', $type->id) }}">{{ trans('message.viewDetail') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="text-center">
                                                {{ $types->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    @section ('script')
        <script type="text/javascript" src="{{ asset('bower_components/style_project1/js/checkin_checkout_time_picker.js') }}"></script>
        @include ('layouts.message')
    @endsection
@endsection
