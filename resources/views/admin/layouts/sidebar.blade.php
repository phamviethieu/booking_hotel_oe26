<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <span class="brand-text font-weight-light"> {{ config('contacts_hotel.name') }} </span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset(config('contacts_hotel.url_avatar_default') . (Auth::user()->avatar ?? config('contacts_hotel.avatar_user_default'))) }}"
                     class="img-circle elevation-2" alt="{{ trans('message.userImage') }}">
            </div>
            <div class="info">
                <a href="{{ route('user.index') }}" class="d-block">
                    {{ Auth::user()->name }}
                </a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ trans('message.admin.dash_board') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ (request()->is('admin/types/*') || request()->is('admin/types')) ? 'menu-open' : '' }}">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            {{ trans('message.admin.type') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{  route('types.index') }}" class="nav-link {{ Route::currentRouteName() == 'types.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('message.functions.list') }}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{  route('types.create') }}" class="nav-link {{ Route::currentRouteName() == 'types.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('message.functions.add') }}
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ (request()->is('admin/rooms/*') || request()->is('admin/rooms')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="fas fa-hotel nav-icon"></i>
                        <p>
                            {{ trans('message.functions.roomList') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('rooms.index') }}" class="nav-link {{ Route::currentRouteName() == 'rooms.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('message.functions.list') }} </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('rooms.create') }}" class="nav-link {{ Route::currentRouteName() == 'rooms.create' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ trans('message.functions.add') }} </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('bookings.index') }}" class="nav-link {{ Route::currentRouteName() == 'bookings.index' ? 'active' : '' }}">
                        <i class="fas fa-calendar nav-icon"></i>
                        {{ trans('message.admin.bookings_list') }}
                        <span class="badge badge-warning badge-booking-list-unapprove"> {{ $booking_waiting }} </span>
                        <span class="badge badge-success badge-booking-list-approved"> {{ $booking_approved }} </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link {{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>{{ trans('message.infor_user.user') }} </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-right">
                        <small>
                            {{ trans('message.notice') }} :
                            <span class="badge badge-warning">&nbsp;&nbsp;</span>
                            {{ trans('message.status.unapproved') }} &nbsp;
                            <span class="badge badge-success">&nbsp;&nbsp;</span>
                            {{ trans('message.status.approved') }}
                        </small>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
