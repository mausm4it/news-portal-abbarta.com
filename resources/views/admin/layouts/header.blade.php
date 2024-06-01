<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ URL('/') }}" class="nav-link">{{ __('Frontend') }}</a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user-circle fa-fw"></i>
                {{ optional(auth()->user())->user_name }}
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">



                <a href=" {{ route('admin.user.edit', Auth::user()->id) }}" class="dropdown-item btn btn-danger">
                    {{ __('Edit Profile') }}
                    <i class="fas fa-logout right"></i>
                    <span class="float-right text-muted text-sm"></span>
                </a>

                <a href="{{ route('logout') }}" class="dropdown-item btn btn-danger">
                    {{ __('Log Out') }}
                    <i class="fas fa-logout right"></i>
                    <span class="float-right text-muted text-sm"></span>
                </a>


            </div>
        </li>



    </ul>
    <!-- Raw Links -->

</nav>
