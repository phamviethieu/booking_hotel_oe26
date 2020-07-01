@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper  pb-3">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            {{ trans('message.functions.add') }}
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
                                {{ trans('message.functions.add') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content col-md-8 offset-2">
            <form method="POST" action="{{ route('types.store')}}" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    {{ trans('message.functions.add') }}
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
                                            {{ trans('message.admin.name') . ' ' . trans('message.functions.typeRoom')}}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" required id="inputType" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPrice">
                                            {{ trans('message.functions.price') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" required id="inputPrice" name="price" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputMaxPeople">
                                            {{ trans('message.max_people') }}
                                            <span class="text-danger">*</span></label>
                                        <input type="number" required id="inputMaxPeople" name="max_people" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputNumBed">
                                            {{ trans('message.num_bed') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" required id="inputNumBed" name="num_bed" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">
                                        {{ trans('message.functions.description') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <textarea id="inputDescription" required name="description" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">
                                        {{ trans('message.video') }} ({{ trans('message.link') }})
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" required id="inputVideo" name="video" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputImages">
                                        {{ trans('message.image') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input name="image[]" type="file" multiple="multiple" />
                                </div>
                                <div class="row pt-3">
                                    <span class="text-danger">*</span>
                                    <small>
                                        {{ trans('message.functions.required') }}
                                    </small>
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
