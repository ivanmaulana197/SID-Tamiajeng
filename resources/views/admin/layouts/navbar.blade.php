<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-lg">
    <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button"
        data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse"
        aria-expanded="false" aria-label="Toggle Navigation">
        <span class="navbar-toggle-icon">
            <span class="toggle-line"></span>
        </span>
    </button>
    {{-- logo mode hp --}}
    <a class="navbar-brand me-1 me-sm-3" href="/">
        <div class="d-flex align-items-center">
            <img class="me-2" src="{{ asset('img/logo.png') }}" alt="" width="40" />
            <span class="font-sans-serif" style="font-size: 16px">Desa Tamiajeng</span>
        </div>
    </a>

    <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
        <ul class="navbar-nav align-items-center ms-auto d-none d-lg-block">
            <li class="nav-item">
                <div class="search-box" data-list='{"valueNames":["title"]}'>
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                        <input class="form-control search-input fuzzy-search" type="search" placeholder="Search..."
                            aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                    <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none"
                        data-bs-dismiss="search">
                        <div class="btn-close-falcon" aria-label="Close"></div>
                    </div>
                </div>
            </li>
        </ul>
        <li class="nav-item">
            <div class="theme-control-toggle fa-icon-wait px-2">
                <input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox"
                    data-theme-control="theme" value="dark" />
                <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                    data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme">
                    <span class="fas fa-sun fs-0"></span>
                </label>
                <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                    data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme">
                    <span class="fas fa-moon fs-0"></span>
                </label>
            </div>
        </li>


        @auth
        <li class="nav-item dropdown"><a class="nav-link pe-0" id="navbarDropdownUser" href="#" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-xl">
                    <img class="rounded-circle" src="{{ asset('img/profile.png') }}" alt="" />

                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                <div class="bg-white dark__bg-1000 rounded-2 py-2">


                    <a class="dropdown-item" href="/">Beranda</a>
                    <div class="dropdown-divider"></div>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>

                    </form>
                </div>
            </div>
        </li>
        @else
        <a class="btn btn-falcon-default btn-sm me-1 mb-1" type="button" href="/login">
            <span class="fas fa-user me-1" data-fa-transform="shrink-3"></span>Login
        </a>

        @endauth
    </ul>
</nav>