@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            {{ trans('message.admin.bookings_list') }}
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
                                {{ trans('message.admin.bookings_list') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>{{ trans('message.booking.bookingId') }}</th>
                            <th>{{ trans('message.infor_user.fullname') }}</th>
                            <th>{{ trans('message.room') }}</th>
                            <th>{{ trans('message.booking.checkin') }}</th>
                            <th>{{ trans('message.booking.checkout') }}</th>
                            <th>{{ trans('message.booking.status') }}</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($booking as $key => $booking)
                            <tr>
                                <td>
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    <a class="badge badge-success bookingDetail" data-toggle="modal" data-id="{{ $booking->id }}" data-target="#exampleModal">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    {{ config('contacts_hotel.prefix_booking_code') . $booking->id }}
                                </td>
                                <td>{{ $booking->user->name }}</td>
                                <td>
                                    @foreach($booking->rooms as $room)
                                        {{ $room->name }}
                                        {{ $booking->rooms->last()->name == $room->name ? '' : ',' }}
                                    @endforeach</td>
                                <td>
                                    {{ $booking->checkin }}
                                </td>
                                <td>
                                    {{ $booking->checkout }}
                                </td>
                                <td>
                                    @switch ($booking->status)
                                        @case (config('status.booking_status.waiting'))
                                            <span class="badge badge-warning booking-status-badge badge{{ $booking->id }}">
                                                {{ trans('message.status.unapproved') }}
                                            </span>
                                            @break
                                        @case (config('status.booking_status.approved'))
                                            <span class="badge badge-success booking-status-badge badge{{ $booking->id }}">
                                                {{ trans('message.status.approved') }}
                                            </span>
                                            @break
                                        @case (config('status.booking_status.get_room'))
                                            <span class="badge badge-info booking-status-badge badge{{ $booking->id }}">
                                                {{ trans('message.status.get_room') }}
                                            </span>
                                            @break
                                        @case (config('status.booking_status.canceled'))
                                            <span class="badge badge-secondary booking-status-badge badge{{ $booking->id }}">
                                                {{ trans('message.status.canceled') }}
                                            </span>
                                            @break
                                    @endswitch
                                </td>
                                <td class="project-actions text-left">

                                    @if($booking->deposit != 0)
                                        @if ($booking->status != config('status.booking_status.canceled'))
                                            @if ($booking->status == config('status.booking.status.waiting'))
                                                <button type="button" data-id="{{ $booking->id }}" data-status="1"
                                                        title="{{ trans('message.approve') }}"
                                                        class="btn btn-sm btn-success approve">
                                                    <i class="booking-status fas fa-check-circle"></i>
                                                </button>
                                            @else
                                                <button type="button" data-id="{{ $booking->id }}" data-status="0"
                                                        title="{{ trans('message.cancel') }}"
                                                        class="btn btn-sm btn-default cancel">
                                                    <i class="booking-status fas fa-times-circle"></i>
                                                </button>
                                            @endif
                                        @endif
                                    @endif
                                        @if($booking->deposit == 0 && $booking->status != config('status.booking_status.canceled'))
                                            <button type="button" data-id="{{ $booking->id }}" data-deposit="1"
                                                    title="pay" class="btn btn-sm btn-primary pay">
                                                <i class="booking-status fas fa-cash-register"></i>
                                            </button>
                                        @endif
                                </td>
                                <td>
                                    @if($booking->status !== config('status.booking_status.canceled'))
                                        <form action="{{ route('bookings.destroy', $booking->id) }}"
                                              class="formDelete float-left form{{ $booking->id }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" id="btn-submit"
                                                    class="btn btn-sm btn-danger delete formDelete">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <i class="fas fa-calendar-week"></i>
                            {{ trans('message.booking.booking_detail') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body showBooking">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div id="showBooking">
</div>
    @section('script')
        <article
            id="delete"
            data-title="{{  trans('message.alert.sure') }}"
            data-text="{{ trans('message.alert.delete_booking') }}"
            data-confirm="{{ trans('message.alert.continue') }}"
            data-cancel="{{ trans('message.alert.close') }}"
        >
        </article>
        <script type="text/javascript" src="{{ mix('js/bookingDetailAjax.js') }}"> </script>
        @include('admin.layouts.message')
    @endsection
@endsection
