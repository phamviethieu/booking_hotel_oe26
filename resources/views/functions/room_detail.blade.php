@extends('layouts.master')
@section('content')
    @include('layouts.sub_banner')
    <div class="content-area rooms-detail-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12">
                    <div class="heading-rooms  clearfix sidebar-widget">
                        <div class="pull-left">
                            <h3>
                                {{ $type->name }}
                            </h3>
                            <p>
                                <i class="fa fa-bed" aria-hidden="true"></i>
                                    {{ $type->num_bed }} {{ trans('message.num_bed') }}
                                <i class="fa fa-users"></i>
                                    {{ $type->max_people }} {{ trans('message.max_people') }}
                            </p>
                        </div>
                        <div class="pull-right">
                            <h3>
                                <span class="price">
                                    {{ round($type->price)}}
                                </span>
                            </h3>
                            <h5>
                                {{ trans('message.anHour') }}
                            </h5>
                        </div>
                    </div>
                    <div class="rooms-detail-slider sidebar-widget">
                        <div class="rooms-detail-slider simple-slider mb-40 ">
                            <div id="carousel-custom" class="carousel slide" data-ride="carousel">
                                <div class="carousel-outer">
                                    <div class="carousel-inner">
                                        @foreach ($type->images as $room_img)
                                            <div class=" {{ $type->images->last()->image == $room_img->image ? 'item active' : 'item' }}">
                                                <img src="{{ asset(config('contacts_hotel.url_room_default') . $room_img->image) }}" class="thumb-preview" alt="Chevrolet Impala">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="left carousel-control" href="#carousel-custom" role="button"
                                       data-slide="prev">
                                    <span class="slider-mover-left t-slider-l" aria-hidden="true">
                                        <i class="fa fa-angle-left"></i>
                                    </span>
                                        <span class="sr-only">{{ trans('message.functions.previous') }}</span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-custom" role="button"
                                       data-slide="next">
                                    <span class="slider-mover-right t-slider-r" aria-hidden="true">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                        <span class="sr-only">{{ trans('message.functions.next') }}</span>
                                    </a>
                                </div>
                                <ol class="carousel-indicators thumbs visible-lg visible-md">
                                    @foreach ($type->images as $key => $room_img)
                                        <li data-target="#carousel-custom" data-slide-to="{{ $key }}" class="">
                                            <img src="{{ asset( config('contacts_hotel.url_room_default') . $room_img->image) }}">
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                        <div class="sidebar-widget search-area-box-2 hidden-lg hidden-md clearfix">
                            <div class="text-center">
                                <h3>{{ trans('message.functions.book').trans('message.room') }}</h3>
                            </div>
                            <div class="search-contents">
                                <form method="GET">
                                    <div class="row">
                                        <div class="search-your-details">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <button class="search-button btn-theme">
                                                        {{ trans('message.booking.booking') }}
                                                        {{ trans('message.room')  }}
                                                        {{ trans('message.functions.now') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="panel-box course-panel-box course-description">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab1default" data-toggle="tab" aria-expanded="true">
                                        {{ trans('message.functions.description') }}
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#tab5default" data-toggle="tab" aria-expanded="false">
                                        {{ trans('message.video') }}
                                    </a>
                                </li>
                            </ul>
                            <div class="panel with-nav-tabs panel-default">
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab1default">
                                            <div class="divv">
                                                <h3>{{ trans('message.functions.description') }}</h3>
                                                <p>{{ $type->description }}</p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab5default">
                                            <div class="inside-video-2">
                                                <h3>{{ trans('message.functions.video') }}</h3>
                                                @if ($type->videos->count())
                                                    <iframe src="{{ $type->videos->first()->video }}" allowfullscreen=""></iframe>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comments-section sidebar-widget">
                        <div class="main-title-2">
                            <h1>
                                <span>
                                    {{ trans('message.functions.comment') }}
                                </span>
                            </h1>
                        </div>
                        <ul class="comments">
                            @foreach ($type->comments as $comment)
                                <li>
                                    <div class="comment">
                                        <div class="comment-author">
                                            <a href="#">
                                                <img src="{{ asset(config('contacts_hotel.url_avatar_default') . ($comment->user->avatar ?? config('contacts_hotel.avatar_user_default'))) }}"  alt="{{ $comment->user->avatar }}">
                                            </a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <div class="comment-meta-author">
                                                    {{ $comment->user->name }}
                                                </div>
                                                <div class="comment-meta-date">
                                                    <span class="hidden-xs">
                                                        {{ date('h:m', strtotime($comment->created_at)) }}
                                                        {{ date('d/m/Y', strtotime($comment->created_at)) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="comment-body">
                                                <p>{{ $comment->comment }}
                                                    @can('edit-comment', $comment)
                                                        <form action="" class="formDelete" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" id="btn-submit" class="btn btn-danger delete">
                                                                {{ trans('message.functions.delete') }}
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @if (Auth::check())
                        <div class="contact-1 sidebar-widget">
                            <div class="main-title-2">
                                <h1>{{ trans('message.functions.leave_a_comment') }}</h1>
                            </div>
                            <div class="contact-form">
                                <form id="contact_form" action="" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <input name="type_id" value="{{ $type->id }}" type="hidden">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                                            <div class="form-group message">
                                                <textarea required class="input-text" name="comment"
                                                    placeholder="{{ trans('message.functions.write_a_comment') }}">
                                                </textarea>
                                            </div>
                                            @error('comment')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                            <div class="send-btn mb-0">
                                                <button type="submit" class="btn-md btn-theme">{{ trans('message.functions.send_message') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="sidebar">
                        <div class="sidebar-widget search-area-box-2 hidden-sm hidden-xs clearfix bg-grey">
                            <h3>{{ trans('message.booking.booking') }}</h3>
                            <div class="form-group mrg-btm-10">
                                <button class="search-button btn-theme">
                                    <a href=""> {{ trans('message.booking.booking') }} {{ trans('message.functions.now') }} </a>
                                </button>
                            </div>
                        </div>
                        <div class="sidebar-widget category-posts">
                            <div class="main-title-2">
                                <h1>{{ trans('message.functions.typeRoom') }}: </h1>
                            </div>
                            @foreach ($types as $type)
                                <ul class="list-unstyled list-cat">
                                    <li>
                                        <a href="#">{{ $type->name }}
                                            <span>
                                                ( {{ $type->rooms()->count() }}
                                                {{ trans('message.room') }} )
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                        <div class="social-media sidebar-widget clearfix">
                            <div class="main-title-2">
                                <h1>{{ trans('message.functions.social_media') }}</h1>
                            </div>
                            <ul class="social-list">
                                <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" class="rss-bg"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                        <div class="sidebar-widget recent-comments">
                            <div class="main-title-2">
                                <h1> {{ trans('message.functions.recent_comment') }} </h1>
                            </div>
                            @if (isset($comment_recent))
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object"
                                                 src="{{ asset(config('contacts_hotel.url_avatar_default')
                                                            . ($comment_recent->user->avatar
                                                            ??
                                                            config('contacts_hotel.avatar_user_default')))
                                                        }}"
                                                 alt="avatar-1">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <p>
                                            {{ $comment_recent->comment }}
                                        </p>
                                        <span>{{ trans('message.by') }} <b> {{ $comment_recent->user->name }} </b></span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <article
        id="delete"
        data-title="{{  trans('message.sure') }}"
        data-text="{{ trans('message.deleteComment') }}"
        data-confirm="{{ trans('message.cancel') }}"
        data-cancel="{{ trans('message.close') }}"
    >
    </article>
@section('script')
    <script src="{{ asset('js/format.js') }}"></script>
    <script src="{{ asset('js/ajaxDeleteComment.js') }}"></script>
@endsection
@endsection
