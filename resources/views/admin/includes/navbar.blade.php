<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('admin.home') }}"><img src="{{ asset('admin/images/logo.png') }}"
                    alt="Logo"></a>
            <a class="navbar-brand hidden" href="#"><img src="{{ asset('admin/images/logo.png') }}" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">


            <div class="user-area dropdown float-right">
                <a href="" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="{{ url('admin/images/admin.png') }}" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <a class="nav-link" href="{{ route('logout') }}">
                        <i class="fa fa-power -off">
                        </i>Logout
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </div>

            </div>

        </div>
    </div>
</header>
