@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper  pb-3">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            {{ trans('message.functions.add') }} {{ trans('message.room') }}
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">{{ trans('message.home') }}</a>
                            </li>
                            <li class="breadcrumb-item active">
                                {{ trans('message.functions.add') }} {{ trans('message.room') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content col-md-8 offset-2">
            <form method="POST" action="{{ route('rooms.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    {{ trans('message.functions.add') }}
                                    {{ trans('message.room') }}
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputType">
                                            {{ trans('message.functions.typeRoom') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control custom-select" name="type_id">
                                            <option selected disabled>
                                                {{ trans('message.functions.select1') }}
                                            </option>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputType">
                                            {{ trans('message.functions.hotel') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control custom-select" name="hotel_id">
                                            <option selected disabled>
                                                {{ trans('message.functions.select1') }}
                                            </option>
                                            @foreach ($hotels as $hotel)
                                                <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">
                                        {{ trans('message.room') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" required id="inputName" name="name" class="form-control">
                                        @error ('name')
                                            {{ $message }}
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">
                                        {{ trans('message.functions.description') }}
                                    </label>
                                    <textarea id="inputDescription" required name="description" class="form-control" rows="4"></textarea>
                                        @error ('description')
                                            {{ $message }}
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">
                                        {{ trans('message.booking.status') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control custom-select" name="status">
                                        <option selected disabled>
                                            {{ trans('message.functions.select1') }}
                                        </option>
                                        <option value="{{ config('status.room_status.busy')  }}">
                                            {{ trans('message.status.waiting') }}
                                        </option>
                                        <option value="{{ config('status.room_status.ready')  }}">
                                            {{ trans('message.status.ready') }}
                                        </option>
                                    </select>
                                </div>
                                <div class="row pt-3">
                                    <span class="text-danger">*</span>
                                    <small> {{ trans('message.functions.required') }} </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success float-right">
                            {{ trans('message.functions.add') }}
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
