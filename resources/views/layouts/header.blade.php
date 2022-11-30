<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button
                class="navbar-toggler"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->

                <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{route('trangchu')}}">CYV</a>

            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{route('quaythuong')}}">Quay Thưởng</a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{route('nhiemvu')}}">Nhiệm Vụ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{route('lichsu')}}">Lịch Sử</a>
                    </li>
                @endauth
            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <!-- Icon -->
            @auth
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <div class="nav-link text-dark">{{ Auth::user()->name }}</div>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault()
                                                this.closest('form').submit()">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </li>

                </ul>
            @else
                <a href="{{ route('login') }}" class="text-sm  text-gray-700 dark:text-gray-500 underline">Log in</a>
            @endauth




        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->