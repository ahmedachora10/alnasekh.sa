<nav class="layout-navbar shadow-none py-0">
    <div class="container">
        <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-4 ">
            <!-- Menu logo wrapper: Start -->
            <div class="navbar-brand app-brand demo d-flex py-0 me-4">
                <!-- Mobile menu toggle: Start-->
                <button class="navbar-toggler border-0 px-0 me-2" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="tf-icons bx bx-menu bx-sm align-middle"></i>
                </button>
                <!-- Mobile menu toggle: End-->
                <a href="{{ route('home') }}" class="app-brand-link">
                    <span class="app-brand-logo demo">
                        @if (session('theme') === 'dark')
                            <img src="{{ asset('assets/img/logo-white.png') }}" width="55px" />
                        @else
                            <img src="{{ asset(setting('logo')) }}" width="55px" />
                        @endif
                    </span>
                    {{-- <span class="app-brand-text demo menu-text fw-bold ms-2 ps-1">{{ setting('app_name') }}</span> --}}
                </a>
            </div>
            <!-- Menu logo wrapper: End -->
            <!-- Menu wrapper: Start -->
            <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
                <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl"
                    type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="tf-icons bx bx-x bx-sm"></i>
                </button>
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link fw-medium active" aria-current="page"
                            href="{{ route('home') }}">{{ trans('front.home') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-medium" aria-current="page"
                            href="#landingFeatures">{{ trans('front.our services') }}</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link fw-medium" aria-current="page"
                            href="#landingPricing">{{ trans('front.packages') }}</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link fw-medium" aria-current="page" href="#">{{ trans('front.about') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-medium" aria-current="page"
                            href="#landingContact">{{ trans('front.contact us') }}</a>
                    </li>
                </ul>
            </div>
            <div class="landing-menu-overlay d-lg-none"></div>
            <!-- Menu wrapper: End -->
            <!-- Toolbar: Start -->
            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Style Switcher -->
                <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">

                    <a class="nav-link dropdown-toggle hide-arrow" href="{{ route('switch.theme') }}">

                        <i class="bx bx-sm bx-{{ session('theme') == 'light' ? 'moon' : 'sun' }}"></i>
                    </a>
                </li>
                <!-- / Style Switcher-->

                <!-- navbar button: Start -->
                {{-- <li>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn btn-danger" target="_blank"><span
                                    class="tf-icons bx bx-user me-md-1"></span><span
                                    class="d-none d-md-block">{{ trans('front.dashboard') }}</span></a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary" target="_blank"><span
                                    class="tf-icons bx bx-user me-md-1"></span><span
                                    class="d-none d-md-block">{{ trans('front.login') }}</span></a>
                        @endauth
                    @endif
                </li> --}}
                <!-- navbar button: End -->
            </ul>
            <!-- Toolbar: End -->
        </div>
    </div>
</nav>
