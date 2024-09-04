<div class="content">
    <div class="navbar-custom">
        <ul class="list-unstyled topbar-menu float-end mb-0">
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none me-0 bg-white border-0" data-bs-toggle="dropdown"
                    href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="account-user-avatar">
                        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->username }}" alt="user-image"
                            class="rounded-circle">
                    </span>
                    <span>
                        <span class="account-user-name">{{ auth()->user()->username }}</span>
                        <span class="account-position">
                            @if (auth()->user()->hasRole('Administrator'))
                                <span>Administrator</span>
                            @elseif (auth()->user()->hasRole('Agent'))
                                <span>Agent</span>
                            @elseif (auth()->user()->hasRole('Engineer'))
                                <span>Engineer</span>
                            @else
                                <span>Guest</span>
                            @endif
                        </span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                    style="">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item notify-item">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                    </a>
                </div>
            </li>
        </ul>
        <button class="button-menu-mobile open-left">
            <i class="fa-sharp fa-solid fa-align-justify"></i>
        </button>
    </div>
</div>
