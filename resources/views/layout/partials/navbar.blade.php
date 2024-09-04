<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <h5 class="text-white text-center fw-bold">MIKROTIK</h5>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown"aria-expanded="false"> <i class="fa-solid fa-user me-1"></i>
                        {{ auth()->user()->username }}
                    </a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="/mikrotik"> <i class="fa-solid fa-house me-1"></i>My Dashboard</a>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item"> <i
                                    class="fa-solid fa-right-from-bracket me-1"></i>Log Out
                            </button>
                        </form>
                    </ul>
                </li>
            @else
                <li class="nav-item">
                    <a href="/login" class="nav-link {{ $title === 'Login' ? 'active' : '' }}">Login <i
                            class="fa-solid fa-right-to-bracket"></i></a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
