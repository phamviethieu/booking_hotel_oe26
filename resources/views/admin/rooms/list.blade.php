@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper pb-3">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ trans('message.functions.roomList') }} </h1>
                        <div class="dropdown show">
                            <div class="form-group">
                                <select id="selectType" class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>{{ trans('message.functions.typeRoom') }}</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{ trans('message.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ trans('message.room') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card card-solid listRoom">
                <div class="card-body pb-0 ">
                    <div class="row d-flex align-items-stretch ">
                        @foreach ($rooms as $room)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch justify-content-center mt-3">
                                <div class="card bg-light">
                                    <div class="card-header text-muted border-bottom-0">
                                        {{ trans('message.room') }} {{ $room->name }}
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead">
                                                    <b>
                                                        {{ $room->type->name }}
                                                    </b>
                                                </h2>
                                            </div>
                                            <div class="col-5 text-center">
                                                @switch ($room->status)
                                                    @case (config('status.room_status.busy'))
                                                        <span class="badge badge-secondary">
                                                            {{ trans('message.status.waiting') }}
                                                        </span>
                                                        @break
                                                    @case (config('status.room_status.ready'))
                                                        <span
                                                        class="badge badge-success">
                                                            {{ trans('message.status.ready') }}
                                                        </span>
                                                        @break
                                                @endswitch
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-sm bg-teal">
                                                <i class="fas fa-pen-alt"></i>
                                                {{ trans('message.functions.edit') }}
                                            </a>
                                            <a class="btn btn-sm btn-primary text-white roomDetail" data-toggle="modal"
                                                data-id="{{ $room->id }}" data-target="#exampleModal">
                                                <i class="fas fa-house-user"></i>
                                                {{ trans('message.viewDetail') }}
                                            </a>
                                            <div class="float-right pl-1">
                                                <form action="{{ route('rooms.destroy', $room->id) }}"
                                                      class="formDelete form{{ $room->id }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" id="btn-submit" class="btn btn-sm btn-danger formDelete">
                                                        <i class="fas fa-trash-alt"></i>
                                                        {{ trans('message.functions.delete') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <nav aria-label="Contacts Page Navigation">
                        {{ $rooms->links() }}
                    </nav>
                </div>
            </div>
        </section>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i
                                class="fas fa-calendar-week"></i> {{ trans('message.admin.room_detail') }} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group showBooking"></ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            {{ trans('message.alert.close') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('script')
        <article
            id="delete"
            data-title="{{  trans('message.alert.sure') }}"
            data-text="{{ trans('message.alert.deleteRoom') }}"
            data-confirm="{{ trans('message.alert.continue') }}"
            data-cancel="{{ trans('message.alert.close') }}"
        >
        </article>
        <script type="text/javascript" src="{{ mix('/js/filter-room-by-type-ajax.js') }}"></script>
        <script type="text/javascript" src="{{ mix('/js/roomDetailAjax.js') }}"></script>
        @include('admin.layouts.message')
    @endsection
@endsection
