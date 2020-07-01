<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light"> {{ config('contacts_hotel.name') }} </span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset(config('contacts_hotel.url_avatar_default') . (Auth::user()->avatar ?? config('contacts_hotel.avatar_user_default'))) }}"
                     class="img-circle elevation-2" alt="{{ trans('message.userImage') }}">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('admin.index') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ trans('message.admin.dash_board') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            {{ trans('message.admin.type') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{  route('types.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('message.functions.list') }}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{  route('types.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('message.functions.add') }}
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-hotel nav-icon"></i>
                        <p>
                            {{ trans('message.functions.roomList') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('rooms.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('message.functions.list') }} </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('rooms.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('message.functions.add') }} </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="fas fa-calendar nav-icon"></i>
                        {{ trans('message.admin.bookings_list') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>{{ trans('message.infor_user.user') }} </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
