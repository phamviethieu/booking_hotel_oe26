@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper  pb-3">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ trans('message.functions.edit') . ' ' . trans('message.room') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">{{ trans('message.home') }}</a>
                            </li>
                            <li class="breadcrumb-item active">
                                {{ trans('message.functions.edit') . ' ' . trans('message.functions.typeRoom') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content col-md-8 offset-2">
            <form method="POST" action="{{ route('types.update', $type->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    {{ trans('message.functions.edit') . ' ' . trans('message.functions.typeRoom') }}
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputType">
                                            {{ trans('message.admin.name') . ' ' . trans('message.functions.typeRoom')}}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" id="inputType" name="name" value="{{ $type->name }}"
                                               class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPrice">
                                            {{ trans('message.functions.price') }}
                                            <span class="text-danger">*</span></label>
                                        <input type="number" id="inputPrice" name="price" value="{{ $type->price }}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputMaxPeople"> {{ trans('message.max_people') }}
                                            <span class="text-danger">*</span></label>
                                        <input type="number" id="inputMaxPeople" name="max_people" value="{{ $type->max_people }}" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputNumBed">  {{ trans('message.num_bed') }}
                                            <span class="text-danger">*</span></label>
                                        <input type="number" id="inputNumBed" name="num_bed" value="{{ $type->num_bed }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputDescription">
                                                {{ trans('message.functions.description') }}
                                            </label>
                                            <textarea id="inputDescription" name="description" class="form-control" rows="4">{{ $type->description }}
                                    </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputDescription">
                                                {{ trans('message.video') }}
                                                ({{ trans('message.link') }})
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="hidden" name="video_id" value="{{ $type->videos->first()->id }}" />
                                            <input type="text" value="{{ $type->videos->first()->video }}" required id="inputVideo" name="video" value="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-right pb-2">
                                            <span class="badge badge-primary">
                                                {{ trans('message.image') }}:
                                            </span>
                                        </div>
                                        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach ($type->images as $image)
                                                    <div class="carousel-item {{ $type->images->first() == $image ? 'active' : '' }}" data-interval="10000">
                                                        <img src="{{ asset(config('contacts_hotel.url_room_default') . $image->image) }}" class="d-block w-100" alt="...">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleInterval"
                                               role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">{{ trans('message.functions.previous') }}</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleInterval"
                                               role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">{{ trans('message.functions.next') }}</span>
                                            </a>
                                        </div>
                                        <div class="form-group text-center pt-3">
                                            <input name="image[]" type="file" multiple="multiple"/>
                                        </div>
                                    </div>
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
                            {{ trans('message.functions.update') }}
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
