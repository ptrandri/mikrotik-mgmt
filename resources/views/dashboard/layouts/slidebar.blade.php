<div class="leftside-menu">
    <!-- LOGO -->
    <a href="/mikrotik" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" height="16" />
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/images/logo_sm.png') }}" alt="" height="16" />
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">
        <!--- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-title side-nav-item">Main</li>

            <li class="side-nav-item">
                <a href="" class="side-nav-link"><i class="fa-sharp fa-solid fa-house"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="/mikrotik" class="side-nav-link"><i class="fa-solid fa-ticket"></i>
                    <span> Mikrotik </span>
                </a>
            </li>
        </ul>

        @role('Administrator')
            <ul class="side-nav">
                <li class="side-nav-title side-nav-item">Admin</li>
                <li class="side-nav-item">
                    <a href="/users" class="side-nav-link"><i class="fa-sharp fa-solid fa-users"></i>
                        <span> Users </span>
                    </a>
                </li>
            </ul>
        @endrole
        <div class="clearfix"></div>
    </div>

</div>
