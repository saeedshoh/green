<nav class="navbar navbar-vertical fixed-start navbar-expand-md navbar-light" id="sidebar">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="">
            <img src="{{ asset('images/logo_tcell.svg') }}" class="navbar-brand-img mx-auto" alt="Tcell">
        </a>

        <div class="collapse navbar-collapse" id="sidebarCollapse">
            <hr class="navbar-divider">
            <h6 class="navbar-heading">Пользователи</h6>

            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}"><i class="fe fe-users"></i>Пользователи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('employees.*') ? 'active' : '' }}" href="{{ route('employees.index') }}"><i class="fe fe-user-check"></i>Сотрудники</a>
                </li>
            </ul>
            <hr class="navbar-divider">
            <h6 class="navbar-heading">Точки</h6>

            <ul class="navbar-nav mb-md-4">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}" href="{{ route('categories.index') }}"><i class="fe fe-grid"></i>Категории</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('places.*') ? 'active' : '' }}" href="{{ route('places.index') }}"><i class="fe fe-map-pin"></i>Точки</a>
                </li>

            </ul>
            <hr class="navbar-divider">
            <h6 class="navbar-heading">Справочники</h6>

            <ul class="navbar-nav mb-md-4">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('quizzes.*') ? 'active' : '' }}" href="{{ route('quizzes.index') }}"><i class="fe fe-check-square"></i>Опросы</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('advertisings.*') ? 'active' : '' }}" href="{{ route('advertisings.index') }}"><i class="fe fe-gift"></i>Рекламы</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('advertisings.*') ? 'active' : '' }}" href="{{ route('places.map') }}"><i class="fe fe-map"></i>Метки на карте</a>
                </li>

            </ul>

            <div class="mt-auto"></div>
        </div>

        <div class="navbar-user d-none d-md-flex" id="sidebarUser">



            <!-- Dropup -->
            <div class="dropup">

                <!-- Toggle -->
                <a href="#" id="sidebarIconCopy" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                        @if (auth()->user())
                            <img class="avatar-img rounded-circle" src="{{ asset(auth()->user()->avatar) }}" alt="...">
                        @else
                            <span class="avatar-title rounded-circle">{{ mb_substr(auth()->user(), 0, 1) }}</span>
                        @endif
                    </div>
                </a>

                <!-- Menu -->
                <div class="dropdown-menu" aria-labelledby="sidebarIconCopy">
                    {{-- <a href="Pa" class="dropdown-item">Выйти</a> --}}
                    <a href="{{ route('logout') }}" class="dropdown-item">Выйти</a>
                </div>

            </div>

        </div>

    </div>
</nav>
