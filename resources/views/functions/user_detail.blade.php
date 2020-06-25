@extends('layouts.master')
@section('title', $user->name . trans('message.viewDetail'))
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
                        <div class="">
                            <img src="{{ asset(config('contacts_hotel.url_avatar_default') . ($user->avatar ?? config('contacts_hotel.avatar_user_default'))) }}" class="img-responsive"/>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item text-muted" contenteditable="false">
                                <strong> {{ trans('message.infor_user.info') }} </strong>
                                &nbsp;
                                <a href="{{ route('user.edit') }}" title="edit profile">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </li>
                            <li class="list-group-item text-right">
                        <span class="pull-left">
                            <strong class="">{{ trans('message.infor_user.fullname') }} &#58;</strong>
                        </span> {{ $user->name }}
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
                            <strong class="">{{ trans('message.infor_user.email') }} &#58; </strong>
                        </span> {{ $user->email }}
                            </li>
                            <li class="list-group-item text-right">
                        <span class="pull-left">
                            <strong class="">{{ trans('message.infor_user.phoneNumber') }} &#58; </strong>
                        </span> {{ $user->phone_number }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h3> {{ trans('message.booking.yourBookingHistory') }}: </h3>
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
                                        @case (config('status.booking_status.waiting'))
                                        <span class="label label-danger">{{ trans('message.booking.unApprove') }}</span>
                                        @break
                                        @case (config('status.booking_status.approved'))
                                        <span class="label label-success">{{ trans('message.booking.approve') }}</span>
                                        @break
                                        @case (config('status.booking_status.canceled'))
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
