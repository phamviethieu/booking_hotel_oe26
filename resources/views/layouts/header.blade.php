<div class="page_loader"></div>
<header class="main-header main-header-2 main-header-3">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navigation" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('bower_components/style_project1/img/logos/white-logo.png') }}">
                </a>
            </div>
            <div class="navbar-collapse collapse" role="navigation" aria-expanded="true" id="app-navigation">
                <ul class="nav navbar-nav">
                    <li class="dropdown active">
                        <a href="{{ route('home') }}" tabindex="0" aria-expanded="false">
                            {{ trans('message.home') }}
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="" tabindex="0" aria-expanded="false">
                            {{ trans('message.room') }}
                        </a>
                    </li>

                    <li class="dropdown">
                        <a tabindex="0" aria-expanded="false">
                            {{ trans('message.contact') }}
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right hidden-sm hidden-xs">
                    <li>
                        <a title="{{ trans('message.lang.vietnamese') }}"
                           href="{{ route('change_language', ['vi']) }}">Vi</a>
                    </li>
                    <li>
                        <a title="{{ trans('message.lang.english') }}"
                           href="{{ route('change_language', ['en']) }}">En</a>
                    </li>
                    @if (Auth::check())
                        <li>
                            <div class="dropdown">
                                <a class="btn-navbar btn btn-sm btn-white-sm-outline btn-round dropdown-toggle"
                                   type="button" data-toggle="dropdown">
                                        {{ Auth::user()->name }}
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('user.index') }}">
                                            {{ trans('message.infor_user.info') }}
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button class="btn-navbar btn btn-sm btn-round">
                                                {{ trans('message.auth.logout') }}
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="btn-navbar btn btn-sm btn-white-sm-outline btn-round">
                                {{ trans('message.auth.login') }}
                            </a>
                        </li>
                    @endif
                    <li>
                        <a id="header-search-btn" class="btn-navbar search-icon"><i class="fa fa-search"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="header-search animated fadeInDown">
            <form class="form-inline">
                <input type="text" class="form-control" id="searchKey"
                       placeholder="{{ trans('message.search') }}...">
                <div class="search-btns">
                    <button type="submit" class="btn btn-default">
                        {{ trans('message.search') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</header>
