<footer class="main-footer clearfix">
    <div class="container">
        <div class="footer-info">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-item">
                        <div class="footer-logo">
                            <a href="{{ route('home') }}">
                                {{ config('contacts_hotel.name') }}
                            </a>
                        </div>
                        <p> {{  config('contacts_hotel.description_' . config('app.locale')) }} </p>

                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-item">
                        <div class="main-title-2">
                            <h1>{{ trans('message.contact') }}</h1>
                        </div>
                        <ul class="personal-info">
                            <li>
                                <i class="fa fa-map-marker"></i>
                                {{ trans('message.address') }}: {{ config('contacts_hotel.address') }}

                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                {{ trans('message.infor_user.email') }}:
                                <a href="mailto:{{ config('contacts_hotel.email') }}">
                                    {{ config('contacts_hotel.email') }}</a>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                {{ trans('message.infor_user.phoneNumber') }}:
                                <a href="tel:{{ config('contacts_hotel.phone') }}">
                                    {{ config('contacts_hotel.phone') }}
                                </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                        <ul class="social-list">
                            @foreach (config('contacts_hotel.social') as $key => $social )
                                <li><a href="{{ $social }} "><i class="fa fa-{{ $key }}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-item gallery">
                        <div class="main-title-2">
                            <h1>{{ trans('message.gallery') }}</h1>
                        </div>
                        <ul>
                            @foreach(config('contacts_hotel.gallery') as $gallery)
                                <li>
                                    <a href="gallery-3column.html">
                                        <img
                                            src="{{ asset('bower_components/style_project1/img/room/' . $gallery . '.jpg') }}"
                                            alt="{{ $gallery }}">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-item newsletter">
                        <div class="main-title-2">
                            <h1>{{ trans('message.newLetter') }}</h1>
                        </div>
                        <div class="newsletter-inner">
                            <form action="#" method="GET">
                                <p><input type="text" class="form-contact" name="email" placeholder="{{ trans('message.infor_user.email') }}">
                                </p>
                                <p>
                                    <a href="{{ route('register') }}" name="submitNewsletter" class="btn btn-small">
                                        {{ trans('message.auth.register') }}
                                    </a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
