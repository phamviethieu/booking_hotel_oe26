<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>


    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" title="{{ trans('message.lang.vietnamese') }}" href="{{ route('change_language', ['vi']) }}">
                Vi
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" title="{{ trans('message.lang.english') }}" href="{{ route('change_language', ['en']) }}">
                En
            </a>
        </li>
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="nav-link btn btn-link">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </li>
    </ul>
</nav>
