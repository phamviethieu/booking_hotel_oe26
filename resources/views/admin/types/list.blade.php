@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper pb-3">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ trans('message.functions.typeRoom') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">
                                    {{ trans('message.home') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                {{ trans('message.room') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card card-solid">
                <div class="card-body pb-0">
                    <div class="row d-flex align-items-stretch">
                        @foreach ($types as $type)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                <div class="card bg-light">
                                    <div class="card-header text-muted border-bottom-0">
                                        <strong> {{ $type->name }} </strong>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <h2 class="lead"><b></b></h2>
                                                <p class="text-muted text-sm">
                                                    <b>{{ trans('message.functions.description') }}: </b>
                                                    {{ $type->description }}
                                                </p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small">
                                                        <span class="fa-li">
                                                        <i class="fas fa-users"></i>
                                                        </span>
                                                        {{ trans('message.max_people') }} : {{ $type->max_people }}
                                                    </li>
                                                    <li class="small">
                                                        <span class="fa-li">
                                                          <i class="fas fa-bed"></i>
                                                        </span>
                                                        {{ trans('message.num_bed') }} : {{ $type->num_bed }}
                                                    </li>
                                                    <li class="small">
                                                        <span class="fa-li">
                                                          <i class="fas fa-money-check-alt"></i>
                                                        </span>
                                                        {{ trans('message.functions.price') }}
                                                            : {{ round($type->price) }}
                                                        {{ config('contacts_hotel.currency') }}
                                                            / {{ trans('message.anHour') }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <a href="{{ route('types.edit', $type->id) }}" class="btn btn-sm bg-teal">
                                                <i class="fas fa-pen-alt"></i> {{ trans('message.functions.edit') }}
                                            </a>
                                            <div class="float-right pl-1">
                                                <form action="{{ route('types.destroy', $type->id) }}"
                                                      class="formDelete  form{{ $type->id }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" id="btn-submit"
                                                            class="btn btn-sm btn-danger formDelete">
                                                        <i class="fas fa-trash-alt"></i> {{ trans('message.functions.delete') }}
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
                        {{ $types->links() }}
                    </nav>
                </div>
            </div>
        </section>
    </div>
@section ('script')
    <article
        id="delete"
        data-title="{{  trans('message.alert.sure') }}"
        data-text="{{ trans('message.alert.deleteType') }}"
        data-confirm="{{ trans('message.functions.cancel') }}"
        data-cancel="{{ trans('message.alert.close') }}"
    >
    </article>
    @include('admin.layouts.message')
@endsection
@endsection
