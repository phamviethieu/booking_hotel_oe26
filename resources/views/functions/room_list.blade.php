@extends('layouts.master')
@section('content')
@extends('layouts.sub_banner')
<div class="content-area rooms-section">
    <div class="container">
        <div class="main-title">
            <h1> {{ trans('message.functions.list_room') }} </h1>
        </div>
        <div class="row">
            @foreach ($types as $room)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="hotel-box">
                        <div class="header clearfix">
                            @if (isset($room->images()->first()->image))
                                <img src="{{ asset(config('contacts_hotel.url_room_default') . ($room->images()->first()->image ?? config('contacts_hotel.image_room_default'))) }}"
                                    alt="room-col-4" class="img-responsive img-room-list">
                            @else
                                <img src="{{ asset(config('contacts_hotel.url_room_default') . config('contacts_hotel.image_room_default')) }}" alt="room-col-4" class="img-responsive img-room-list">
                            @endif
                        </div>
                        <div class="detail clearfix">
                            <div class="pr">
                                 {{ $room->price }}<sub>/{{ trans('message.night') }}</sub>
                            </div>
                            <h3>
                                <a href="{{ route('client.rooms.show', [$room->id]) }}">{{ $room->name }}</a>
                            </h3>
                            <h5 class="location">
                                <p>
                                    {{ $room->description }}
                                </p>
                            </h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center">
            {{ $types->links() }}
        </div>
    </div>
</div>

@endsection
