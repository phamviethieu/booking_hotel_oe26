@extends('layouts.master')
@section('title', $user->name.trans('message.functions.edit'))
@section('content')
    @extends('layouts.sub_banner')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('message.infor_user.helloUser') }} {{ $user->name }} &#33;
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <img src="{{ asset(config('contacts_hotel.url_avatar_default') . ($user->avatar ?? config('contacts_hotel.avatar_user_default'))) }}" class="img-responsive"/>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item text-muted" contenteditable="false">
                                    <strong> {{ trans('message.infor_user.info') }} </strong>
                                </li>
                                <li class="list-group-item text-right">
                                    <div class="form-group">
                                        <label for="description">{{ trans('message.infor_user.avatar') }}</label>
                                        <input type="file" name="avatar" class="form-control"/>
                                        <br>
                                        @error ('image')
                                            <span class="text-danger"> &#42; {{ $message }} </span>
                                        @enderror
                                    </div>
                                </li>
                                <li class="list-group-item text-right">
                                    <span class="pull-left">
                                        <strong class="">{{ trans('message.infor_user.fullname') }} &#58; </strong>
                                    </span> <input name="name" type="text" value="{{ $user->name }}"/>
                                    <br>
                                    @error ('name')
                                        <span class="text-danger"> &#42; {{ $message }} </span>
                                    @enderror
                                </li>
                                <li class="list-group-item text-right">
                                    <span class="pull-left">
                                        <strong class="">{{ trans('message.infor_user.join') }} &#58; </strong>
                                    </span>
                                    {{ date('d-m-Y', strtotime($user->created_at)) }}
                                </li>
                                <li class="list-group-item text-right">
                                    <span class="pull-left">
                                        <strong class="">{{ trans('message.infor_user.account') }} &#58; </strong>
                                    </span> {{ $user->username }}
                                </li>
                                <li class="list-group-item text-right">
                                    <span class="pull-left">
                                        <strong class="">{{ trans('message.infor_user.email') }} &#58;</strong>
                                    </span> {{ $user->email }}
                                </li>
                                <li class="list-group-item text-right">
                                    <span class="pull-left">
                                        <strong class="">{{ trans('message.infor_user.phoneNumber') }} &#58;</strong>
                                    </span><input name="phone_number" type="text" value="{{ $user->phone_number }}"/>
                                    <br>
                                    @error ('phone_number')
                                        <span class="text-danger"> &#42; {{ $message }} </span>
                                    @enderror
                                </li>
                                <li class="list-group-item text-right">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-lg fa-save"></i>
                                        {{ trans('message.functions.save') }}
                                    </button>
                                    <a href="{{ url()->previous() }}" class="btn btn-danger">
                                        <i class="fa fa-window-close"></i> {{ trans('message.functions.back') }}
                                    </a>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h3> {{ trans('message.booking.yourBookingHistory') }}&#58; </h3>
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('message.booking.bookingId') }}</th>
                        <th scope="col">{{ trans('message.room') }}</th>
                        <th scope="col">{{ trans('message.booking.checkin') }}</th>
                        <th scope="col">{{ trans('message.booking.checkout') }}</th>
                        <th scope="col">{{ trans('message.booking.timeBooking') }}</th>
                        <th scope="col">{{ trans('message.functions.price') }}</th>
                        <th scope="col">{{ trans('message.booking.status') }}</th>
                        <th scope="col">{{ trans('message.booking.tools') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($bookings->count())
                        @foreach ($bookings as $key => $booking)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $booking->id }}</td>
                                <td>
                                    @foreach ($booking->rooms as $room)
                                        {{ trans('message.room') . ' ' . $room->name }}
                                        {{ $booking->rooms->last()->name == $room->name ? '' : ',' }}
                                    @endforeach
                                </td>
                                <td>{{ date('h:m d-m-Y', strtotime($booking->checkin)) }}</td>
                                <td>{{ date('h:m d-m-Y', strtotime($booking->checkout)) }}</td>
                                <td>{{ date('h:m d-m-Y', strtotime($booking->created_at)) }}</td>
                                <td>{{ $booking->price }} VND</td>
                                <td>
                                    @switch ($booking->status)
                                        @case (config('status.booking.waiting'))
                                        <span class="label label-danger">{{ trans('message.booking.unApprove') }}</span>
                                        @break
                                        @case (config('status.booking.approved'))
                                        <span class="label label-success">{{ trans('message.booking.approve') }}</span>
                                        @break
                                        @case (config('status.booking.canceled'))
                                        <span class="label label-default">{{ trans('message.booking.expired') }}</span>
                                        @break
                                    @endswitch
                                </td>
                                <td align="center">
                                    @if ($booking->status == config('status.booking.waiting'))
                                        <form class="formDelete form{{ $booking->id }}" method="POST" action="{{ route('user.cancel_booking', $booking->id) }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $booking->id }}">
                                            <button type="submit" title=" {{ trans('message.functions.cancel') }}" id="btnDelete" class="btn btn-danger formDelete">
                                                <i class="fa fa-times-circle"></i>
                                            </button>
                                        </form>
                                    @else
                                        <a title="{{ trans('message.functions.call' ) }}"> {{ trans('message.contact') }}</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="8"> {{ trans('message.booking.bookingEmpty') }} </th>
                        </tr>
                    @endif
                    </tbody>
                </table>
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
    <article
        id="delete"
        data-title="{{  trans('message.alert.sure') }}"
        data-text="{{ trans('message.alert.text') }}"
        data-confirm="{{ trans('message.alert.continue') }}"
        data-cancel="{{ trans('message.alert.close') }}"
    >
    </article>
    @section('script')
        @include('layouts.message')
    @endsection
@endsection
