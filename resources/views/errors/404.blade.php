@extends('layouts.master')
@section('title', '404')
@section('content')
    @include('layouts.sub_banner')
    <div class="page_loader"></div>
    <div class="pages-404-2 content-area-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="error404-content">
                        <div class="error404">404</div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="nobottomborder">
                        <h1>{{ trans('message.errors.title404') }}!</h1>
                        <p>{{ trans('message.errors.description404') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
