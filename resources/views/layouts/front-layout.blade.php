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
                                <a class="footer-link" aria-current="page" href="#" data-bs-toggle="modal"
                                    data-bs-target="#jobsForm">{{ trans('front.jobs') }}</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <h6 class="footer-title mb-4">{{ trans('front.to download the profile') }}</h6>
                        <a href="{{ asset(setting('profile_file')) }}"
                            download="profile.{{ str(setting('profile_file'))->afterLast('.') }}"
                            class="d-block w-auto footer-link mb-3 pb-2 btn btn-outline-danger">
                            {{ trans('front.click here') }}
                        </a>

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

    <x-dashboard.modals.modal1 id="jobsForm" :title="trans('common.job request')">
        <livewire:store-job-request />
    </x-dashboard.modals.modal1>


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
