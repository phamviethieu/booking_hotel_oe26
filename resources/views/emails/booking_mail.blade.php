@component('mail::message')
    # {{ trans('message.email.hello') }}, {{ $data['name'] }}!
    {{ trans('message.email.title') }}
@component('mail::table')
|{{ trans('message.booking.booking') }}| {{ trans('message.email.number') }}|
| :----------------------------------  | :--------------------------------: |
@foreach($bookings as $key => $status)
|{{ $key }}                            |{{ $status }}                       |
@endforeach
@endcomponent
@component('mail::button', ['url' => route('bookings.index')])
    {{ trans('message.email.button') }}
@endcomponent
    {{ trans('message.email.thanks') }}
    <br>
@endcomponent
