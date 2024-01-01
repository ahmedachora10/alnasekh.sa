<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="{{ session('theme', 'light') }}-style layout-navbar-fixed"
    dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" data-theme="theme-default"
    data-assets-path="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/"
    data-base-url="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1"
    data-framework="laravel" data-template="front-menu-theme-default-dark">

<head>
    <meta charset="utf-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />

    <title>{{ setting('app_name') }} {{ @$title }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon"
        href="{{ asset(str_replace('public/', 'storage/', setting('icon'))) ?? asset('assets/img/favicon/favicon.ico') }}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link href="{{ asset('assets/fontawesome/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/solid.css') }}" rel="stylesheet">


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon"
        href="{{ asset(str_replace('public/', 'storage/', setting('icon'))) ?? asset('assets/img/favicon/favicon.ico') }}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link href="{{ asset('assets/fontawesome/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/solid.css') }}" rel="stylesheet">

    @if (app()->getLocale() == 'ar')
        {{-- <link rel="stylesheet" href="{{ asset('assets/css/rtl.css') }}"> --}}
        @if (session('theme') == 'dark')
            <link rel="stylesheet" href="{{ asset('assets/vendor/css/dark-core.css') }}"
                class="template-customizer-core-css" />

            <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default-dark.css') }}"
                class="template-customizer-theme-css">
        @else
            <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}"
                class="template-customizer-core-css" />
            <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}"
                class="template-customizer-theme-css">
        @endif


        <style>
            .phone-number {
                direction: ltr !important;
                text-align: right;
            }
        </style>
    @else
        @if (session('theme') == 'dark')
            <link rel="stylesheet" href="{{ asset('assets/vendor/css/dark-core.css') }}"
                class="template-customizer-core-css" />

            <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default-dark.css') }}"
                class="template-customizer-theme-css">
        @else
            <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}"
                class="template-customizer-core-css" />
            <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
                class="template-customizer-theme-css" />
        @endif
    @endif


    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bs-stepper.css') }}" />
    {{-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/basic.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/custom-dropzone.css') }}" /> --}}

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    @stack('component-styles')

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <!-- Scripts -->
    {{-- @vite('resources/css/app.css') --}}

    <link rel="stylesheet" href="{{ asset('assets/css/front/front-page.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/front/nouislider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/front/swiper.css') }}">

    <!-- Page Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/front/front-page-landing.css') }}">

    <style type="text/css">
        .layout-menu-fixed .layout-navbar-full .layout-menu,
        .layout-menu-fixed-offcanvas .layout-navbar-full .layout-menu {
            top: 84.5250015258789px !important;
        }

        .layout-page {
            padding-top: 84.5250015258789px !important;
        }

        .content-wrapper {
            padding-bottom: 0px !important;
        }
    </style>
    <style>
        #template-customizer {
            background: #fff;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, .2);
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            font-family: Open Sans, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol !important;
            font-size: inherit !important;
            height: 100%;
            position: fixed;
            right: 0;
            top: 0;
            -webkit-transform: translateX(420px);
            transform: translateX(420px);
            transition: all .2s ease-in;
            width: 400px;
            z-index: 99999999
        }

        #template-customizer h5 {
            font-size: 11px;
            position: relative
        }

        #template-customizer>h5 {
            -ms-flex: 0 0 auto;
            flex: 0 0 auto
        }

        #template-customizer .disabled {
            color: #d1d2d3 !important
        }

        #template-customizer .form-label {
            font-size: .9375rem
        }

        #template-customizer .form-check-label {
            font-size: .8125rem
        }

        #template-customizer .template-customizer-t-panel_header {
            font-size: 1.125rem
        }

        #template-customizer.template-customizer-open {
            -webkit-transform: none !important;
            transform: none !important;
            transition-delay: .1s
        }

        #template-customizer.template-customizer-open .custom-option.checked {
            border-width: 2px;
            color: var(--bs-primary)
        }

        #template-customizer.template-customizer-open .custom-option.checked .custom-option-content {
            border: none
        }

        #template-customizer.template-customizer-open .custom-option .custom-option-content {
            border: 1px solid transparent
        }

        #template-customizer .template-customizer-header a:hover {
            color: inherit !important
        }

        #template-customizer .template-customizer-open-btn {
            background: var(--bs-primary);
            border-bottom-left-radius: 15%;
            border-top-left-radius: 15%;
            color: #fff !important;
            display: block;
            font-size: 18px !important;
            height: 42px;
            left: 0;
            line-height: 42px;
            opacity: 1;
            position: absolute;
            text-align: center;
            top: 180px;
            -webkit-transform: translateX(-62px);
            transform: translateX(-62px);
            transition: all .1s linear .2s;
            width: 42px;
            z-index: -1
        }

        @media (max-width:991.98px) {
            #template-customizer .template-customizer-open-btn {
                top: 145px
            }
        }

        .dark-style #template-customizer .template-customizer-open-btn {
            background: var(--bs-primary)
        }

        #template-customizer .template-customizer-open-btn:before {
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAABClJREFUaEPtmY1RFEEQhbsjUCIQIhAiUCNQIxAiECIQIxAiECIAIpAMhAiECIQI2vquZqnZvp6fhb3SK5mqq6Ju92b69bzXf6is+dI1t1+eAfztG5z1BsxsU0S+ici2iPB3vm5E5EpEDlSVv2dZswFIxv8UkZcNy+5EZGcuEHMCOBeR951uvVDVD53vVl+bE8DvDu8Pxtyo6ta/BsByg1R15Bwzqz5/LJgn34CZwfnPInI4BUB6/1hV0cSjVxcAM4PbcBZjL0XklIPN7Is3fLCkdQPpPYw/VNXj5IhPIvJWRIhSl6p60ULWBGBm30Vk123EwRxCuIzWkkjNrCZywith10ewE1Xdq4GoAjCz/RTXW44Ynt+LyBEfT43kYfbj86J3w5Q32DNcRQDpwF+dkQXDMey8xem0L3TEqB4g3PZWad8agBMRgZPeu96D1/C2Zbh3X0p80Op1xxloztN48bMQQNoc7+eLEuAoPSPiIDY4Ooo+E6ixeNXM+D3GERz2U3CIqMstLJUgJQDe+7eq6mub0NYEkLAKwEHkiBQDCZtddZCZ8d6r7JDwFkoARklHRPZUFVDVZWbwGuNrC4EfdOzFrRABh3Wnqhv+d70AEBLGFROPmeHlnM81G69UdSd6IUuM0GgUVn1uqWmg5EmMfBeEyB7Pe3txBkY+rGT8j0J+WXq/BgDkUCaqLgEAnwcRog0veMIqFAAwCy2wnw+bI2GaGboBgF9k5N0o0rUSGUb4eO0BeO9j/GYhkSHMHMTIqwGARX6p6a+nlPBl8kZuXMD9j6pKfF9aZuaFOdJCEL5D4eYb9wCYVCanrBmGyii/tIq+SLj/HQBCaM5bLzwfPqdQ6FpVHyra4IbuVbXaY7dETC2ESPNNWiIOi69CcdgSMXsh4tNSUiklMgwmC0aNd08Y5WAES6HHehM4gu97wyhBgWpgqXsrASglprDy7CwhehMZOSbK6JMSma+Fio1KltCmlBIj7gfZOGx8ppQSXrhzFnOhJ/31BDkjFHRvOd09x0mRBA9SFgxUgHpQg0q0t5ymPMlL+EnldFTfDA0NAmf+OTQ0X0sRouf7NNkYGhrOYNrxtIaGg83MNzVDSe3LXLhP7O/yrCsCz1zlWTpjWkuZAOBpX3yVnLqI1yLCOKU6qMrmP7SSrUEw54XF4WBIK5FxCMOr3lVsfGqNSmPzBXUnJTIX1jyVBq9wO6UObOpgC5GjO98vFKnTdQMZXxEsWZlDiCZMIxAbNxQOqlpVZtobejBaZNoBnRDzMFpkxvTQOD36BlrcySZuI6p1ACB6LU3wWuf5581+oHfD1vi89bz3nFUC8Nm7ZlP3nKkFbM4bWPt/MSFwklprYItwt6cmvpWJ2IVcQBCz6bLysSCv3SaANCiTsnaNRrNRqMXVVT1/BrAqz/buu/Y38Ad3KC5PARej0QAAAABJRU5ErkJggg==");
            background-size: 100% 100%;
            content: "";
            display: block;
            height: 22px;
            margin: 10px;
            position: absolute;
            width: 22px
        }

        .customizer-hide #template-customizer .template-customizer-open-btn {
            display: none
        }

        [dir=rtl] #template-customizer .template-customizer-open-btn {
            border-radius: 0;
            border-bottom-right-radius: 15%;
            border-top-right-radius: 15%
        }

        [dir=rtl] #template-customizer .template-customizer-open-btn:before {
            margin-left: -2px
        }

        #template-customizer.template-customizer-open .template-customizer-open-btn {
            opacity: 0;
            -webkit-transform: none !important;
            transform: none !important;
            transition-delay: 0s
        }

        #template-customizer .template-customizer-inner {
            -ms-flex: 0 1 auto;
            flex: 0 1 auto;
            opacity: 1;
            overflow: auto;
            position: relative;
            transition: opacity .2s
        }

        #template-customizer .template-customizer-inner>div:first-child>hr:first-of-type {
            display: none !important
        }

        #template-customizer .template-customizer-inner>div:first-child>h5:first-of-type {
            padding-top: 0 !important
        }

        #template-customizer .template-customizer-themes-inner {
            opacity: 1;
            position: relative;
            transition: opacity .2s
        }

        #template-customizer .template-customizer-theme-item {
            -ms-flex-align: center;
            -ms-flex-pack: justify;
            align-items: center;
            cursor: pointer;
            display: -ms-flexbox;
            display: flex;
            -ms-flex: 1 1 100%;
            flex: 1 1 100%;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 0 24px;
            width: 100%
        }

        #template-customizer .template-customizer-theme-item input {
            opacity: 0;
            position: absolute;
            z-index: -1
        }

        #template-customizer .template-customizer-theme-item input~span {
            opacity: .25;
            transition: all .2s
        }

        #template-customizer .template-customizer-theme-item .template-customizer-theme-checkmark {
            border-bottom: 1px solid;
            border-right: 1px solid;
            display: inline-block;
            height: 12px;
            opacity: 0;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            transition: all .2s;
            width: 6px
        }

        [dir=rtl] #template-customizer .template-customizer-theme-item .template-customizer-theme-checkmark {
            border-left: 1px solid;
            border-right: none;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg)
        }

        #template-customizer .template-customizer-theme-item input:checked:not([disabled])~span,
        #template-customizer .template-customizer-theme-item input:checked:not([disabled])~span .template-customizer-theme-checkmark,
        #template-customizer .template-customizer-theme-item:hover input:not([disabled])~span {
            opacity: 1
        }

        #template-customizer .template-customizer-theme-colors span {
            border-radius: 50%;
            box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .1);
            display: block;
            height: 10px;
            margin: 0 1px;
            width: 10px
        }

        #template-customizer.template-customizer-loading .template-customizer-inner,
        #template-customizer.template-customizer-loading-theme .template-customizer-themes-inner {
            opacity: .2
        }

        #template-customizer.template-customizer-loading .template-customizer-inner:after,
        #template-customizer.template-customizer-loading-theme .template-customizer-themes-inner:after {
            bottom: 0;
            content: "";
            display: block;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            z-index: 999
        }

        @media (max-width:1200px) {
            #template-customizer {
                display: none;
                visibility: hidden !important
            }
        }

        @media (max-width:575.98px) {
            #template-customizer {
                -webkit-transform: translateX(320px);
                transform: translateX(320px);
                width: 300px
            }
        }

        .layout-menu-100vh #template-customizer {
            height: 100vh
        }

        [dir=rtl] #template-customizer {
            left: 0;
            right: auto;
            -webkit-transform: translateX(-420px);
            transform: translateX(-420px)
        }

        [dir=rtl] #template-customizer .template-customizer-open-btn {
            left: auto;
            right: 0;
            -webkit-transform: translateX(62px);
            transform: translateX(62px)
        }

        [dir=rtl] #template-customizer .template-customizer-close-btn {
            left: 0;
            right: auto
        }

        #template-customizer .template-customizer-layouts-options[disabled] {
            opacity: .5;
            pointer-events: none
        }

        [dir=rtl] .template-customizer-t-style_switch_light {
            padding-right: 0 !important
        }

        .bg-dark-light {
            background-color: #2b2c40 !important;
        }
    </style>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script>
        "use strict";
        let assetsPath = document.documentElement.getAttribute("data-assets-path"),
            templateName = document.documentElement.getAttribute("data-template"),
            rtlSupport = !0;
    </script>

    @stack('styles')

    @livewireStyles

<body>
    <!-- Navbar: Start -->
    @include('layouts.front.navbar')
    <!-- Navbar: End -->

    <!-- Sections:Start -->
    <div data-bs-spy="scroll" class="scrollspy-example">

        {{ $slot }}

        <!-- Useful features: Start -->
        {{-- <section id="landingFeatures" class="section-py landing-features">
            <div class="container">
                <div class="text-center mb-3 pb-1">
                    <span class="badge bg-label-primary">Useful Features</span>
                </div>
                <h3 class="text-center mb-1">
                    <span class="section-title">Everything you need</span> to start your next project
                </h3>
                <p class="text-center mb-3 mb-md-5 pb-3">
                    Not just a set of tools, the package includes ready-to-deploy conceptual application.
                </p>
                <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5">
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-3">
                            <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/icons/laptop.png"
                                alt="laptop charging">
                        </div>
                        <h5 class="mb-3">Quality Code</h5>
                        <p class="features-icon-description">
                            Code structure that all developers will easily understand and fall in love with.
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-3">
                            <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/icons/rocket.png"
                                alt="transition up">
                        </div>
                        <h5 class="mb-3">Continuous Updates</h5>
                        <p class="features-icon-description">
                            Free updates for the next 12 months, including new demos and features.
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-3">
                            <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/icons/paper.png"
                                alt="edit">
                        </div>
                        <h5 class="mb-3">Stater-Kit</h5>
                        <p class="features-icon-description">
                            Start your project quickly without having to remove unnecessary features.
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-3">
                            <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/icons/check.png"
                                alt="3d select solid">
                        </div>
                        <h5 class="mb-3">API Ready</h5>
                        <p class="features-icon-description">
                            Just change the endpoint and see your own data loaded within seconds.
                        </p>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-3">
                            <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/icons/user.png"
                                alt="lifebelt">
                        </div>
                        <h5 class="mb-3">Excellent Support</h5>
                        <p class="features-icon-description">An easy-to-follow doc with lots of references and code
                            examples.</p>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-3">
                            <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/icons/keyboard.png"
                                alt="google docs">
                        </div>
                        <h5 class="mb-3">Well Documented</h5>
                        <p class="features-icon-description">An easy-to-follow doc with lots of references and code
                            examples.</p>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Useful features: End -->

        <!-- Real customers reviews: Start -->
        {{-- <section id="landingReviews" class="section-py bg-body landing-reviews pb-0">
            <!-- What people say slider: Start -->
            <div class="container">
                <div class="row align-items-center gx-0 gy-4 g-lg-5">
                    <div class="col-md-6 col-lg-5 col-xl-3">
                        <div class="mb-3 pb-1">
                            <span class="badge bg-label-primary">Real Customers Reviews</span>
                        </div>
                        <h3 class="mb-1"><span class="section-title">What people say</span></h3>
                        <p class="mb-3 mb-md-5">
                            See what our customers have to<br class="d-none d-xl-block">
                            say about their experience.
                        </p>
                        <div class="landing-reviews-btns d-flex align-items-center gap-3">
                            <button id="reviews-previous-btn" class="btn btn-label-primary reviews-btn"
                                type="button">
                                <i class="bx bx-chevron-left bx-sm"></i>
                            </button>
                            <button id="reviews-next-btn" class="btn btn-label-primary reviews-btn" type="button">
                                <i class="bx bx-chevron-right bx-sm"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7 col-xl-9">
                        <div class="swiper-reviews-carousel overflow-hidden mb-5 pb-md-2 pb-md-3">
                            <div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden"
                                id="swiper-reviews">
                                <div class="swiper-wrapper" id="swiper-wrapper-a3a4dda101c32631c" aria-live="off"
                                    style="cursor: grab; transition-duration: 0ms; transform: translate3d(-1745px, 0px, 0px);">






                                    <div class="swiper-slide swiper-slide-next" role="group" aria-label="4 / 6"
                                        style="width: 344px; margin-right: 5px;" data-swiper-slide-index="3">
                                        <div class="card h-100">
                                            <div
                                                class="card-body text-body d-flex flex-column justify-content-between h-100">
                                                <div class="mb-3">
                                                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/branding/logo-4.png"
                                                        alt="client logo" class="client-logo img-fluid">
                                                </div>
                                                <p>
                                                    All the requirements for developers have been taken into
                                                    consideration, so I’m able to build
                                                    any interface I want.
                                                </p>
                                                <div class="text-warning mb-3">
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bx-star bx-sm"></i>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-2 avatar-sm">
                                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/4.png"
                                                            alt="Avatar" class="rounded-circle">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Sara Smith</h6>
                                                        <p class="small text-muted mb-0">Founder of Continental</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" role="group" aria-label="5 / 6"
                                        style="width: 344px; margin-right: 5px;" data-swiper-slide-index="4">
                                        <div class="card h-100">
                                            <div
                                                class="card-body text-body d-flex flex-column justify-content-between h-100">
                                                <div class="mb-3">
                                                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/branding/logo-5.png"
                                                        alt="client logo" class="client-logo img-fluid">
                                                </div>
                                                <p>
                                                    “I've never used a theme as versatile and flexible as Vuexy. It's my
                                                    go to for building
                                                    dashboard sites on almost any project.”
                                                </p>
                                                <div class="text-warning mb-3">
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-2 avatar-sm">
                                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/5.png"
                                                            alt="Avatar" class="rounded-circle">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Eugenia Moore</h6>
                                                        <p class="small text-muted mb-0">Founder of Hubspot</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" role="group" aria-label="6 / 6"
                                        style="width: 344px; margin-right: 5px;" data-swiper-slide-index="5">
                                        <div class="card h-100">
                                            <div
                                                class="card-body text-body d-flex flex-column justify-content-between h-100">
                                                <div class="mb-3">
                                                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/branding/logo-6.png"
                                                        alt="client logo" class="client-logo img-fluid">
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam nemo
                                                    mollitia, ad eum
                                                    officia numquam nostrum repellendus consequuntur!
                                                </p>
                                                <div class="text-warning mb-3">
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bx-star bx-sm"></i>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-2 avatar-sm">
                                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/1.png"
                                                            alt="Avatar" class="rounded-circle">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Sara Smith</h6>
                                                        <p class="small text-muted mb-0">Founder of Continental</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" role="group" aria-label="1 / 6"
                                        style="width: 344px; margin-right: 5px;" data-swiper-slide-index="0">
                                        <div class="card h-100">
                                            <div
                                                class="card-body text-body d-flex flex-column justify-content-between h-100">
                                                <div class="mb-3">
                                                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/branding/logo-1.png"
                                                        alt="client logo" class="client-logo img-fluid">
                                                </div>
                                                <p>
                                                    “Vuexy is hands down the most useful front end Bootstrap theme I've
                                                    ever used. I can't wait
                                                    to use it again for my next project.”
                                                </p>
                                                <div class="text-warning mb-3">
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-2 avatar-sm">
                                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/1.png"
                                                            alt="Avatar" class="rounded-circle">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Cecilia Payne</h6>
                                                        <p class="small text-muted mb-0">CEO of Airbnb</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide swiper-slide-prev" role="group" aria-label="2 / 6"
                                        style="width: 344px; margin-right: 5px;" data-swiper-slide-index="1">
                                        <div class="card h-100">
                                            <div
                                                class="card-body text-body d-flex flex-column justify-content-between h-100">
                                                <div class="mb-3">
                                                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/branding/logo-2.png"
                                                        alt="client logo" class="client-logo img-fluid">
                                                </div>
                                                <p>
                                                    “I've never used a theme as versatile and flexible as Vuexy. It's my
                                                    go to for building
                                                    dashboard sites on almost any project.”
                                                </p>
                                                <div class="text-warning mb-3">
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-2 avatar-sm">
                                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/2.png"
                                                            alt="Avatar" class="rounded-circle">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Eugenia Moore</h6>
                                                        <p class="small text-muted mb-0">Founder of Hubspot</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide swiper-slide-active" role="group" aria-label="3 / 6"
                                        style="width: 344px; margin-right: 5px;" data-swiper-slide-index="2">
                                        <div class="card h-100">
                                            <div
                                                class="card-body text-body d-flex flex-column justify-content-between h-100">
                                                <div class="mb-3">
                                                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/branding/logo-3.png"
                                                        alt="client logo" class="client-logo img-fluid">
                                                </div>
                                                <p>
                                                    This template is really clean &amp; well documented. The docs are
                                                    really easy to understand and
                                                    it's always easy to find a screenshot from their website.
                                                </p>
                                                <div class="text-warning mb-3">
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                    <i class="bx bxs-star bx-sm"></i>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-2 avatar-sm">
                                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/3.png"
                                                            alt="Avatar" class="rounded-circle">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Curtis Fletcher</h6>
                                                        <p class="small text-muted mb-0">Design Lead at Dribbble</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-button-next" tabindex="0" role="button"
                                    aria-label="Next slide" aria-controls="swiper-wrapper-a3a4dda101c32631c"></div>
                                <div class="swiper-button-prev" tabindex="0" role="button"
                                    aria-label="Previous slide" aria-controls="swiper-wrapper-a3a4dda101c32631c">
                                </div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- What people say slider: End -->
            <hr class="m-0">
            <!-- Logo slider: Start -->
            <div class="container">
                <div class="swiper-logo-carousel py-4 my-lg-2">
                    <div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden"
                        id="swiper-clients-logos">
                        <div class="swiper-wrapper" id="swiper-wrapper-74c9120eaedccb67" aria-live="off">
                            <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 5"
                                style="width: 229.333px;">
                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/branding/logo_1-light.png"
                                    alt="client logo" class="client-logo"
                                    data-app-light-img="front-pages/branding/logo_1-light.png"
                                    data-app-dark-img="front-pages/branding/logo_1-dark.png">
                            </div>
                            <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 5"
                                style="width: 229.333px;">
                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/branding/logo_2-light.png"
                                    alt="client logo" class="client-logo"
                                    data-app-light-img="front-pages/branding/logo_2-light.png"
                                    data-app-dark-img="front-pages/branding/logo_2-dark.png">
                            </div>
                            <div class="swiper-slide" role="group" aria-label="3 / 5" style="width: 229.333px;">
                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/branding/logo_3-light.png"
                                    alt="client logo" class="client-logo"
                                    data-app-light-img="front-pages/branding/logo_3-light.png"
                                    data-app-dark-img="front-pages/branding/logo_3-dark.png">
                            </div>
                            <div class="swiper-slide" role="group" aria-label="4 / 5" style="width: 229.333px;">
                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/branding/logo_4-light.png"
                                    alt="client logo" class="client-logo"
                                    data-app-light-img="front-pages/branding/logo_4-light.png"
                                    data-app-dark-img="front-pages/branding/logo_4-dark.png">
                            </div>
                            <div class="swiper-slide" role="group" aria-label="5 / 5" style="width: 229.333px;">
                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/branding/logo_5-light.png"
                                    alt="client logo" class="client-logo"
                                    data-app-light-img="front-pages/branding/logo_5-light.png"
                                    data-app-dark-img="front-pages/branding/logo_5-dark.png">
                            </div>
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                </div>
            </div>
            <!-- Logo slider: End -->
        </section> --}}
        <!-- Real customers reviews: End -->

        <!-- Our great team: Start -->
        {{-- <section id="landingTeam" class="section-py landing-team">
            <div class="container">
                <div class="text-center mb-3 pb-1">
                    <span class="badge bg-label-primary">Our Great Team</span>
                </div>
                <h3 class="text-center mb-1"><span class="section-title">Supported</span> by Real People</h3>
                <p class="text-center mb-md-5 pb-3">Who is behind these great-looking interfaces?</p>
                <div class="row gy-5 mt-2">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card mt-3 mt-lg-0 shadow-none">
                            <div class="bg-label-primary position-relative team-image-box">
                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/landing-page/team-member-1.png"
                                    class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl img-fluid"
                                    alt="human image">
                            </div>
                            <div class="card-body border border-label-primary border-top-0 text-center">
                                <h5 class="card-title mb-0">Sophie Gilbert</h5>
                                <p class="text-muted mb-0">Project Manager</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card mt-3 mt-lg-0 shadow-none">
                            <div class="bg-label-info position-relative team-image-box">
                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/landing-page/team-member-2.png"
                                    class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl img-fluid"
                                    alt="human image">
                            </div>
                            <div class="card-body border border-label-info border-top-0 text-center">
                                <h5 class="card-title mb-0">Paul Miles</h5>
                                <p class="text-muted mb-0">UI Designer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card mt-3 mt-lg-0 shadow-none">
                            <div class="bg-label-danger position-relative team-image-box">
                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/landing-page/team-member-3.png"
                                    class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl img-fluid"
                                    alt="human image">
                            </div>
                            <div class="card-body border border-label-danger border-top-0 text-center">
                                <h5 class="card-title mb-0">Nannie Ford</h5>
                                <p class="text-muted mb-0">Development Lead</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card mt-3 mt-lg-0 shadow-none">
                            <div class="bg-label-success position-relative team-image-box">
                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/landing-page/team-member-4.png"
                                    class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl img-fluid"
                                    alt="human image">
                            </div>
                            <div class="card-body border border-label-success border-top-0 text-center">
                                <h5 class="card-title mb-0">Chris Watkins</h5>
                                <p class="text-muted mb-0">Marketing Manager</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Our great team: End -->

        <!-- Pricing plans: Start -->
        {{-- <section id="landingPricing" class="section-py bg-body landing-pricing">
            <div class="container">
                <div class="text-center mb-3 pb-1">
                    <span class="badge bg-label-primary">Pricing Plans</span>
                </div>
                <h3 class="text-center mb-1"><span class="section-title">Tailored pricing plans</span> designed for
                    you</h3>
                <p class="text-center mb-4 pb-3">
                    All plans include 40+ advanced tools and features to boost your product.<br>Choose the best plan to
                    fit
                    your needs.
                </p>
                <div class="text-center mb-5">
                    <div class="position-relative d-inline-block pt-3 pt-md-0">
                        <label class="switch switch-primary me-0">
                            <span class="switch-label">Pay Monthly</span>
                            <input type="checkbox" class="switch-input price-duration-toggler" checked="">
                            <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Pay Annual</span>
                        </label>
                        <div class="pricing-plans-item position-absolute d-flex">
                            <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/icons/pricing-plans-arrow.png"
                                alt="pricing plans arrow" class="scaleX-n1-rtl">
                            <span class="fw-semibold mt-2 ms-1"> Save 25%</span>
                        </div>
                    </div>
                </div>
                <div class="row gy-4 pt-lg-3">
                    <!-- Basic Plan: Start -->
                    <div class="col-xl-4 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center">
                                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/icons/paper-airplane.png"
                                        alt="paper airplane icon" class="mb-4 pb-2 scaleX-n1-rtl">
                                    <h4 class="mb-1">Basic</h4>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="price-monthly h1 text-primary fw-bold mb-0 d-none">$19</span>
                                        <span class="price-yearly h1 text-primary fw-bold mb-0">$14</span>
                                        <sub class="h6 text-muted mb-0 ms-1">/mo</sub>
                                    </div>
                                    <div class="position-relative pt-2">
                                        <div class="price-yearly text-muted price-yearly-toggle">$ 168 / year</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li>
                                        <h5>
                                            <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i
                                                    class="bx bx-check bx-xs"></i></span>
                                            Timeline
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i
                                                    class="bx bx-check bx-xs"></i></span>
                                            Basic search
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i
                                                    class="bx bx-check bx-xs"></i></span>
                                            Live chat widget
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i
                                                    class="bx bx-check bx-xs"></i></span>
                                            Email marketing
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i
                                                    class="bx bx-check bx-xs"></i></span>
                                            Custom Forms
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i
                                                    class="bx bx-check bx-xs"></i></span>
                                            Traffic analytics
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i
                                                    class="bx bx-check bx-xs"></i></span>
                                            Basic Support
                                        </h5>
                                    </li>
                                </ul>
                                <div class="d-grid mt-4 pt-3">
                                    <a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/front-pages/payment"
                                        class="btn btn-label-primary">Get Started</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Basic Plan: End -->

                    <!-- Favourite Plan: Start -->
                    <div class="col-xl-4 col-lg-6">
                        <div class="card border border-primary shadow-lg">
                            <div class="card-header">
                                <div class="text-center">
                                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/icons/plane.png"
                                        alt="plane icon" class="mb-4 pb-2 scaleX-n1-rtl">
                                    <h4 class="mb-1">Team</h4>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="price-monthly h1 text-primary fw-bold mb-0 d-none">$29</span>
                                        <span class="price-yearly h1 text-primary fw-bold mb-0">$22</span>
                                        <sub class="h6 text-muted mb-0 ms-1">/mo</sub>
                                    </div>
                                    <div class="position-relative pt-2">
                                        <div class="price-yearly text-muted price-yearly-toggle">$ 264 / year</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li>
                                        <h5>
                                            <span class="badge badge-center rounded-pill bg-primary p-0 me-2"><i
                                                    class="bx bx-check bx-xs"></i></span>
                                            Everything in basic
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            <span class="badge badge-center rounded-pill bg-primary p-0 me-2"><i
                                                    class="bx bx-check bx-xs"></i></span>
                                            Timeline with database
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            <span class="badge badge-center rounded-pill bg-primary p-0 me-2"><i
                                                    class="bx bx-check bx-xs"></i></span>
                                            Advanced search
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            <span class="badge badge-center rounded-pill bg-primary p-0 me-2"><i
                                                    class="bx bx-check bx-xs"></i></span>
                                            Marketing automation
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            <span class="badge badge-center rounded-pill bg-primary p-0 me-2"><i
                                                    class="bx bx-check bx-xs"></i></span>
                                            Advanced chatbot
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            <span class="badge badge-center rounded-pill bg-primary p-0 me-2"><i
                                                    class="bx bx-check bx-xs"></i></span>
                                            Campaign management
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            <span class="badge badge-center rounded-pill bg-primary p-0 me-2"><i
                                                    class="bx bx-check bx-xs"></i></span>
                                            Collaboration tools
                                        </h5>
                                    </li>
                                </ul>
                                <div class="d-grid mt-4 pt-3">
                                    <a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/front-pages/payment"
                                        class="btn btn-primary">Get Started</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Favourite Plan: End -->

                    <!-- Standard Plan: Start -->
                    <div class="col-xl-4 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center">
                                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/icons/shuttle-rocket.png"
                                        alt="shuttle rocket icon" class="mb-4 pb-2 scaleX-n1-rtl">
                                    <h4 class="mb-1">Enterprise</h4>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="price-monthly h1 text-primary fw-bold mb-0 d-none">$49</span>
                                        <span class="price-yearly h1 text-primary fw-bold mb-0">$37</span>
                                        <sub class="h6 text-muted mb-0 ms-1">/mo</sub>
                                    </div>
                                    <div class="position-relative pt-2">
                                        <div class="price-yearly text-muted price-yearly-toggle">$ 444 / year</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li>
                                        <h5>
                                            <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i
                                                    class="bx bx-check bx-xs"></i></span>
                                            Everything in premium
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i
                                                    class="bx bx-check bx-xs"></i></span>
                                            Timeline with database
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i
                                                    class="bx bx-check bx-xs"></i></span>
                                            Fuzzy search
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i
                                                    class="bx bx-check bx-xs"></i></span>
                                            A/B testing sanbox
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i
                                                    class="bx bx-check bx-xs"></i></span>
                                            Custom permissions
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i
                                                    class="bx bx-check bx-xs"></i></span>
                                            Social media automation
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            <span class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i
                                                    class="bx bx-check bx-xs"></i></span>
                                            Sales automation tools
                                        </h5>
                                    </li>
                                </ul>
                                <div class="d-grid mt-4 pt-3">
                                    <a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/front-pages/payment"
                                        class="btn btn-label-primary">Get Started</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Standard Plan: End -->
                </div>
            </div>
        </section> --}}
        <!-- Pricing plans: End -->

        <!-- Fun facts: Start -->
        {{-- <section id="landingFunFacts" class="section-py landing-fun-facts">
            <div class="container">
                <div class="row gy-3">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-primary shadow-none">
                            <div class="card-body text-center">
                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/icons/laptop.png"
                                    alt="laptop" class="mb-2">
                                <h5 class="h2 mb-1">7.1k+</h5>
                                <p class="fw-medium mb-0">
                                    Support Tickets<br>
                                    Resolved
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-success shadow-none">
                            <div class="card-body text-center">
                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/icons/user-success.png"
                                    alt="laptop" class="mb-2">
                                <h5 class="h2 mb-1">50k+</h5>
                                <p class="fw-medium mb-0">
                                    Join creatives<br>
                                    community
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-info shadow-none">
                            <div class="card-body text-center">
                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/icons/diamond-info.png"
                                    alt="laptop" class="mb-2">
                                <h5 class="h2 mb-1">4.8/5</h5>
                                <p class="fw-medium mb-0">
                                    Highly Rated<br>
                                    Products
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-warning shadow-none">
                            <div class="card-body text-center">
                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/icons/check-warning.png"
                                    alt="laptop" class="mb-2">
                                <h5 class="h2 mb-1">100%</h5>
                                <p class="fw-medium mb-0">
                                    Money Back<br>
                                    Guarantee
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Fun facts: End -->

        <!-- FAQ: Start -->
        {{-- <section id="landingFAQ" class="section-py bg-body landing-faq">
            <div class="container">
                <div class="text-center mb-3 pb-1">
                    <span class="badge bg-label-primary">FAQ</span>
                </div>
                <h3 class="text-center mb-1">Frequently asked <span class="section-title">questions</span></h3>
                <p class="text-center mb-5 pb-3">Browse through these FAQs to find answers to commonly asked questions.
                </p>
                <div class="row gy-5">
                    <div class="col-lg-5">
                        <div class="text-center">
                            <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/landing-page/faq-boy-with-logos.png"
                                alt="faq boy with logos" class="faq-image">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="accordion" id="accordionExample">
                            <div class="card accordion-item active">
                                <h2 class="accordion-header" id="headingOne">
                                    <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionOne" aria-expanded="true"
                                        aria-controls="accordionOne">
                                        Do you charge for each upgrade?
                                    </button>
                                </h2>

                                <div id="accordionOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lemon drops chocolate cake gummies carrot cake chupa chups muffin topping.
                                        Sesame snaps icing
                                        marzipan gummi bears macaroon dragée danish caramels powder. Bear claw dragée
                                        pastry topping
                                        soufflé. Wafer gummi bears marshmallow pastry pie.
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button type="button" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#accordionTwo"
                                        aria-expanded="false" aria-controls="accordionTwo">
                                        Do I need to purchase a license for each website?
                                    </button>
                                </h2>
                                <div id="accordionTwo" class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Dessert ice cream donut oat cake jelly-o pie sugar plum cheesecake. Bear claw
                                        dragée oat cake
                                        dragée ice cream halvah tootsie roll. Danish cake oat cake pie macaroon tart
                                        donut gummies. Jelly
                                        beans candy canes carrot cake. Fruitcake chocolate chupa chups.
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button type="button" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#accordionThree"
                                        aria-expanded="false" aria-controls="accordionThree">
                                        What is regular license?
                                    </button>
                                </h2>
                                <div id="accordionThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Regular license can be used for end products that do not charge users for access
                                        or service(access
                                        is free and there will be no monthly subscription fee). Single regular license
                                        can be used for
                                        single end product and end product can be used by you or your client. If you
                                        want to sell end
                                        product to multiple clients then you will need to purchase separate license for
                                        each client. The
                                        same rule applies if you want to use the same end product on multiple
                                        domains(unique setup). For
                                        more info on regular license you can check official description.
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button type="button" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#accordionFour"
                                        aria-expanded="false" aria-controls="accordionFour">
                                        What is extended license?
                                    </button>
                                </h2>
                                <div id="accordionFour" class="accordion-collapse collapse"
                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis et aliquid
                                        quaerat possimus maxime!
                                        Mollitia reprehenderit neque repellat delenibx delectus architecto dolorum
                                        maxime, blanditiis
                                        earum ea, incidunt quam possimus cumque.
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button type="button" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#accordionFive"
                                        aria-expanded="false" aria-controls="accordionFive">
                                        Which license is applicable for SASS application?
                                    </button>
                                </h2>
                                <div id="accordionFive" class="accordion-collapse collapse"
                                    aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi molestias
                                        exercitationem ab cum
                                        nemo facere voluptates veritatis quia, eveniet veniam at et repudiandae mollitia
                                        ipsam quasi
                                        labore enim architecto non!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- FAQ: End -->

        <!-- CTA: Start -->
        {{-- <section id="landingCTA" class="section-py landing-cta p-lg-0 pb-0">
            <div class="container">
                <div class="row align-items-center gy-5 gy-lg-0">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h6 class="h2 text-primary fw-bold mb-1">Ready to Get Started?</h6>
                        <p class="fw-medium mb-4">Start your project with a 14-day free trial</p>
                        <a href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/front-pages/payment"
                            class="btn btn-primary">Get Started</a>
                    </div>
                    <div class="col-lg-6 pt-lg-5 text-center text-lg-end">
                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/landing-page/cta-dashboard.png"
                            alt="cta dashboard" class="img-fluid">
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- CTA: End -->

        <!-- Contact Us: Start -->
        {{-- <section id="landingContact" class="section-py bg-body landing-contact">
            <div class="container">
                <div class="text-center mb-3 pb-1">
                    <span class="badge bg-label-primary">Contact US</span>
                </div>
                <h3 class="text-center mb-1"><span class="section-title">Let's work</span> together</h3>
                <p class="text-center mb-4 mb-lg-5 pb-md-3">Any question or remark? just write us a message</p>
                <div class="row gy-4">
                    <div class="col-lg-5">
                        <div class="contact-img-box position-relative border p-2 h-100">
                            <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/landing-page/contact-customer-service.png"
                                alt="contact customer service" class="contact-img w-100 scaleX-n1-rtl img-fluid">
                            <div class="pt-3 px-4 pb-1">
                                <div class="row gy-3 gx-md-4">
                                    <div class="col-md-6 col-lg-12 col-xl-6">
                                        <div class="d-flex align-items-center">
                                            <div class="badge bg-label-primary rounded p-2 me-2"><i
                                                    class="bx bx-envelope bx-sm"></i></div>
                                            <div>
                                                <p class="mb-0">Email</p>
                                                <h5 class="mb-0">
                                                    <a href="mailto:example@gmail.com"
                                                        class="text-heading">example@gmail.com</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-12 col-xl-6">
                                        <div class="d-flex align-items-center">
                                            <div class="badge bg-label-success rounded p-2 me-2">
                                                <i class="bx bx-phone-call bx-sm"></i>
                                            </div>
                                            <div>
                                                <p class="mb-0">Phone</p>
                                                <h5 class="mb-0"><a href="tel:+1234-568-963"
                                                        class="text-heading">+1234 568 963</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-1">Send a message</h4>
                                <p class="mb-4">
                                    If you would like to discuss anything related to payment, account, licensing,<br
                                        class="d-none d-lg-block">
                                    partnerships, or have pre-sales questions, you’re at the right place.
                                </p>
                                <form>
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <label class="form-label" for="contact-form-fullname">Full Name</label>
                                            <input type="text" class="form-control" id="contact-form-fullname"
                                                placeholder="john">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="contact-form-email">Email</label>
                                            <input type="text" id="contact-form-email" class="form-control"
                                                placeholder="johndoe@gmail.com">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="contact-form-message">Message</label>
                                            <textarea id="contact-form-message" class="form-control" rows="9" placeholder="Write a message"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Send inquiry</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Contact Us: End -->
    </div>
    <!-- / Sections:End -->

    @php
        $locale = app()->getLocale() == 'en' ? '_en' : '';
    @endphp

    <footer class="landing-footer bg-body footer-text">

        <div class="footer-top">
            <div class="container">
                <div class="row gx-0 gy-4 g-md-5">
                    <div class="col-lg-5">
                        <a href="{{ route('home') }}" class="app-brand-link mb-1">
                            <span class="app-brand-logo demo">
                                <img src="{{ asset('assets/img/logo-white.png') }}" alt="logo" width="60px">
                            </span>
                        </a>
                        <p class="footer-text footer-logo-description mb-4">
                            {{ setting("app_description$locale") }}
                        </p>
                        <livewire:store-subscriber />
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <h6 class="footer-title mb-4">{{ trans('front.pages') }}</h6>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <a href="{{ route('home') }}" class="footer-link">{{ trans('front.home') }}</a>
                            </li>

                            <li class="mb-3">
                                <a class="footer-link" aria-current="page"
                                    href="#landingFeatures">{{ trans('front.services') }}</a>
                            </li>

                            <li class="mb-3">
                                <a class="footer-link" aria-current="page"
                                    href="#landingPricing">{{ trans('front.packages') }}</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <h6 class="footer-title mb-4">{{ trans('front.pages') }}</h6>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <a class="footer-link" aria-current="page"
                                    href="#landingPricing">{{ trans('front.about') }}</a>
                            </li>

                            <li class="mb-3">
                                <a class="footer-link" aria-current="page"
                                    href="#">{{ trans('front.our websites') }}</a>
                            </li>

                            <li class="mb-3">
                                <a class="footer-link" aria-current="page"
                                    href="#">{{ trans('front.jobs') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom py-3">
            <div
                class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
                <div class="mb-2 mb-md-0">
                    <span class="footer-text">
                        {!! setting("footer$locale") !!}</span>
                    <span class="footer-text">©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                    </span>
                </div>
                <div>
                    @if (setting('facebook'))
                        <a href="{{ setting('facebook') }}" class="footer-link me-3" target="_blank">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                    @endif

                    @if (setting('twitter'))
                        <a href="{{ setting('twitter') }}" class="footer-link me-3" target="_blank">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    @endif

                    @if (setting('instagram'))
                        <a href="{{ setting('instagram') }}" class="footer-link me-3" target="_blank">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    @endif

                    @if (setting('linkedin'))
                        <a href="{{ setting('linkedin') }}" class="footer-link me-3" target="_blank">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    @endif

                    @if (setting('whatsapp'))
                        <a href="{{ setting('whatsapp') }}" class="footer-link me-3" target="_blank">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    @endif

                    @if (setting('tiktok'))
                        <a href="{{ setting('tiktok') }}" class="footer-link me-3" target="_blank">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                    @endif

                    @if (setting('youtube'))
                        <a href="{{ setting('youtube') }}" class="footer-link me-3" target="_blank">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </footer>


    <!-- Include Scripts -->
    <!-- $isFront is used to append the front layout scripts only on the front layout otherwise the variable will be blank -->
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/vendor/js/dropdown-hover.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/mega-dropdown.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/nouislider.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/swiper.js') }}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/js/front-main.js') }}"></script>
    <!-- END: Theme JS-->
    <!-- Pricing Modal JS-->
    <!-- END: Pricing Modal JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('assets/js/front-page-landing.js') }}"></script>
    <!-- END: Page JS-->

    <script type="text/javascript" id="">
        console.log("TS:GTM Worked!");
    </script>
    <script type="text/javascript" id="">
        (function(b, c, d) {
            var a = b.createElement("script");
            a.type = "text/javascript";
            a.src = "https://a.omappapi.com/app/js/api.min.js";
            a.async = !0;
            a.dataset.user = c;
            a.dataset.account = d;
            b.getElementsByTagName("head")[0].appendChild(a)
        })(document, 252882, 269977);
    </script>

    @stack('scripts')
    @livewireScripts
</body>

</html>
