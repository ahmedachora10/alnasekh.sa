<x-front-layout>
    @php
        $getHeadline = function (string $key, $column) use ($headlines) {
            $column = app()->getLocale() == 'en' ? $column . '_en' : $column;
            return $headlines->firstWhere('section', $key)->{$column} ?? '';
        };
    @endphp

    @if (count($sliders) > 0)
        <!-- Hero: Start -->
        <section id="hero-animation" style="height: 100%;">
            <div id="landingHero" class="section-py landing-hero position-relative" style="padding: 0 !important;">
                <div class="swiper" id="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($sliders as $item)
                            <div class="swiper-slide">
                                <div data-src="{{ asset($item->thumbnail) }}" alt="slider-{{ $item->id }}"
                                    class="img" style="background-image: url({{ asset($item->thumbnail) }})">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="landing-hero-blank"></div>
        </section>
        <!-- Hero: End -->
    @endif

    @if (count($ourServices) > 0)
        <!-- Useful features: Start -->
        <section id="landingFeatures" class="section-py landing-features">
            <div class="container">
                <x-front.headline :headline="$getHeadline('our specials', 'title')" :subHeadline="$getHeadline('our specials', 'subtitle')" :description="$getHeadline('our specials', 'description')" />
                <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5">
                    @foreach ($ourServices as $item)
                        <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                            <div class="text-center mb-3">
                                <img src="{{ asset($item->thumbnail) }}" alt="laptop charging">
                            </div>
                            <h5 class="mb-3">{{ $item->title }}</h5>
                            @if ($item->description)
                                <p class="features-icon-description">
                                    {{ $item->description }}
                                </p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Useful features: End -->
    @endif

    @if (count($packages) > 0)
        <!-- Pricing plans: Start -->
        <section id="landingPricing" class="section-py bg-body landing-pricing">
            <div class="container">
                <x-front.headline :headline="$getHeadline('packages', 'title')" :subHeadline="$getHeadline('packages', 'subtitle')" :description="$getHeadline('packages', 'description')" />
                {{-- <div class="text-center mb-5">
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
            </div> --}}
                <div class="row gy-4 pt-lg-3">
                    <!-- Basic Plan: Start -->
                    @foreach ($packages as $item)
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="text-center">
                                        <img src="{{ asset($item->thumbnail) }}" alt="paper airplane icon"
                                            class="mb-4 pb-2 scaleX-n1-rtl">
                                        <h4 class="mb-1">{{ $item->title }}</h4>
                                        <div class="d-flex align-items-center justify-content-center">
                                            @if ($item->yearly_price == 0)
                                                <span class="h5 text-primary fw-bold mb-0">
                                                    {{ trans('front.contact us') }}
                                                </span>
                                            @else
                                                <span
                                                    class="price-monthly h4 text-primary fw-bold mb-0 d-none">{{ $item->yearly_price }}ر.س</span>
                                                <span
                                                    class="price-yearly h4 text-primary fw-bold mb-0">{{ $item->yearly_price }}ر.س</span>
                                                <sub class="h6 text-muted mb-0 ms-1">/{{ trans('front.year') }}</sub>
                                            @endif
                                        </div>
                                        {{-- <div class="position-relative pt-2">
                                            <div class="price-yearly text-muted price-yearly-toggle">$
                                                {{ $item->yearly_price }} / {{ trans('front.year') }}</div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        @foreach ($item->properties as $value)
                                            <li>
                                                <h5>
                                                    @if ($item->yearly_price != 0)
                                                        <span
                                                            class="badge badge-center rounded-pill bg-label-primary p-0 me-2">
                                                            <i class="bx bx-check bx-xs"></i>
                                                        </span>
                                                    @endif
                                                    {{ $value }}
                                                </h5>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="d-grid mt-4 pt-3">
                                        @if ($item->yearly_price == 0)
                                            <a href="#"
                                                class="btn btn-label-primary">{{ trans('front.contact us') }}</a>
                                        @else
                                            <a href="#"
                                                class="btn btn-label-primary">{{ trans('front.get started') }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Basic Plan: End -->
                </div>
            </div>
        </section>
        <!-- Pricing plans: End -->
    @endif

    <!-- Fun facts: Start -->
    <section id="landingFunFacts" class="section-py landing-fun-facts">
        <div class="container">
            <x-front.headline :headline="$getHeadline('statistics', 'title')" :subHeadline="$getHeadline('statistics', 'subtitle')" :description="$getHeadline('statistics', 'description')" />
            <div class="row gy-3">
                @foreach ($statistics as $item)
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-primary shadow-none">
                            <div class="card-body text-center">
                                <img src="{{ asset($item->thumbnail) }}" alt="laptop" class="mb-2">
                                <h5 class="h2 mb-1">{{ $item->statistic }}</h5>
                                <p class="fw-medium mb-0">
                                    {{ $item->get_title }}

                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Fun facts: End -->

    @if (true)
        <!-- Pricing plans: Start -->
        <section class="section-py bg-body" id="services">
            <div class="container">
                <x-front.headline :headline="$getHeadline('services', 'title')" :subHeadline="$getHeadline('services', 'subtitle')" :description="$getHeadline('services', 'description')" />

                <div class="row gy-4 pt-lg-3">
                    <!-- Basic Plan: Start -->
                    @for ($i = 0; $i < 4; $i++)
                        <div class="col-lg-3 col-md-6">
                            <x-dashboard.cards.service-card />
                        </div>
                    @endfor
                    <!-- Basic Plan: End -->
                </div>
            </div>
        </section>
        <!-- Pricing plans: End -->
    @endif

    <!-- : Start -->
    <section id="landingCTA" class="section-py landing-cta p-lg-0 pb-0">
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
    </section>
    <!-- : End -->

    <!-- Real customers reviews: Start -->
    <section id="landingReviews" class="section-py bg-body landing-reviews pb-0">
        <!-- What people say slider: Start -->
        <div class="container">
            <div class="row align-items-center gx-0 gy-4 g-lg-5">
                <div class="col-md-6 col-lg-5 col-xl-3">
                    <x-front.headline :headline="$getHeadline('testimonials', 'title')" :subHeadline="$getHeadline('testimonials', 'subtitle')" :description="$getHeadline('testimonials', 'description')" />
                    <div class="landing-reviews-btns d-flex align-items-center gap-3">
                        <button id="reviews-previous-btn" class="btn btn-label-primary reviews-btn" type="button">
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
                            <div class="swiper-wrapper" id="swiper-wrapper-0f1b91be13d10894c" aria-live="off"
                                style="cursor: grab; transition-duration: 0ms; transform: translate3d(-795px, 0px, 0px);">
                                <div class="swiper-slide" role="group" aria-label="2 / 6"
                                    style="width: 245px; margin-right: 20px;" data-swiper-slide-index="1">
                                    <div class="card h-100">
                                        <div
                                            class="card-body text-body d-flex flex-column justify-content-between h-100">
                                            <div class="mb-3">
                                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/branding/logo-2.png"
                                                    alt="client logo" class="client-logo img-fluid">
                                            </div>
                                            <p>
                                                “I've never used a theme as versatile and flexible as Vuexy. It's my go
                                                to for building
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
                                <div class="swiper-slide" role="group" aria-label="3 / 6"
                                    style="width: 245px; margin-right: 20px;" data-swiper-slide-index="2">
                                    <div class="card h-100">
                                        <div
                                            class="card-body text-body d-flex flex-column justify-content-between h-100">
                                            <div class="mb-3">
                                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/branding/logo-3.png"
                                                    alt="client logo" class="client-logo img-fluid">
                                            </div>
                                            <p>
                                                This template is really clean &amp; well documented. The docs are really
                                                easy to understand and
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
                                <div class="swiper-slide swiper-slide-prev" role="group" aria-label="4 / 6"
                                    style="width: 245px; margin-right: 20px;" data-swiper-slide-index="3">
                                    <div class="card h-100">
                                        <div
                                            class="card-body text-body d-flex flex-column justify-content-between h-100">
                                            <div class="mb-3">
                                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/branding/logo-4.png"
                                                    alt="client logo" class="client-logo img-fluid">
                                            </div>
                                            <p>
                                                All the requirements for developers have been taken into consideration,
                                                so I’m able to build
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
                                <div class="swiper-slide swiper-slide-active" role="group" aria-label="5 / 6"
                                    style="width: 245px; margin-right: 20px;" data-swiper-slide-index="4">
                                    <div class="card h-100">
                                        <div
                                            class="card-body text-body d-flex flex-column justify-content-between h-100">
                                            <div class="mb-3">
                                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/branding/logo-5.png"
                                                    alt="client logo" class="client-logo img-fluid">
                                            </div>
                                            <p>
                                                “I've never used a theme as versatile and flexible as Vuexy. It's my go
                                                to for building
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
                                <div class="swiper-slide swiper-slide-next" role="group" aria-label="6 / 6"
                                    style="width: 245px; margin-right: 20px;" data-swiper-slide-index="5">
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
                                    style="width: 245px; margin-right: 20px;" data-swiper-slide-index="0">
                                    <div class="card h-100">
                                        <div
                                            class="card-body text-body d-flex flex-column justify-content-between h-100">
                                            <div class="mb-3">
                                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/branding/logo-1.png"
                                                    alt="client logo" class="client-logo img-fluid">
                                            </div>
                                            <p>
                                                “Vuexy is hands down the most useful front end Bootstrap theme I've ever
                                                used. I can't wait
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
                            </div>
                            <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                                aria-controls="swiper-wrapper-0f1b91be13d10894c"></div>
                            <div class="swiper-button-prev" tabindex="0" role="button"
                                aria-label="Previous slide" aria-controls="swiper-wrapper-0f1b91be13d10894c"></div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- What people say slider: End -->
    </section>
    <!-- Real customers reviews: End -->

    @if (count($clients) > 0)
        <section id="our-clients" class="section-py landing-reviews">
            <div class="container">
                <x-front.headline :headline="$getHeadline('our clients', 'title')" :subHeadline="$getHeadline('our clients', 'subtitle')" :description="$getHeadline('our clients', 'description')" />

                <div class="swiper-logo-carousel py-4 my-lg-2">
                    <div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden"
                        id="swiper-clients-logos">
                        <div class="swiper-wrapper" style="height: auto;">
                            @foreach ($clients as $item)
                                <div class="swiper-slide swiper-slide-active" role="group" style="width: 254px;">
                                    <div class="text-center">
                                        <a href="{{ $item->link }}" target="_blank">
                                            <img src="{{ asset($item->thumbnail) }}" alt="client logo"
                                                class="client-logo d-block mx-auto">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Contact Us: Start -->
    <section id="landingContact" class="section-py bg-body landing-contact">
        <div class="container">
            <x-front.headline :headline="$getHeadline('contact us', 'title')" :subHeadline="$getHeadline('contact us', 'subtitle')" :description="$getHeadline('contact us', 'description')" />
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
                                            <p class="mb-0">{{ trans('table.columns.email') }}</p>
                                            <h5 class="mb-0">
                                                <a href="mailto:example@gmail.com"
                                                    class="text-heading">{{ setting('email') }}</a>
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
                                            <p class="mb-0">{{ trans('table.columns.phone') }}</p>
                                            <h5 class="mb-0"><a href="tel:+1234-568-963"
                                                    class="text-heading">{{ setting('phone') }}</a></h5>
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
                            <h4 class="mb-3">{{ trans('front.contact us') }}</h4>
                            <livewire:contact-us-form />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Us: End -->

    @push('styles')
        <style>
            .swiper-container {
                width: 100%;
                height: 100%;
            }

            #swiper .swiper-slide {
                text-align: center;
                font-size: 18px;
                background: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            #swiper .swiper-slide img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .img {
                width: 100%;
                height: 100%;
                background-size: cover;
                background-position: center center;
            }
        </style>
    @endpush

    @push('scripts')
        <script defer>
            var heroSwiper = new Swiper('#swiper', {
                // Optional parameters
                // direction: 'vertical',
                loop: true,

            });

            var clientSwiper = new Swiper('#clients-swiper', {
                // Optional parameters
                // direction: 'vertical',
                loop: true,
                slidesPerView: 4,
                spaceBetween: 20,
                // freeMode: true,

                breakpoints: {
                    0: {
                        slidesPerView: 1,
                    },
                    640: {
                        slidesPerView: 2,
                    },
                    768: {
                        slidesPerView: 4,
                    },
                    1024: {
                        slidesPerView: 4,
                    },
                },

            });

            var clientLogosSwiper = new Swiper('#swiper-clients-logos', {
                // Optional parameters
                // direction: 'vertical',
                loop: true,
                slidesPerView: 4,
                spaceBetween: 20,
                // freeMode: true,

                breakpoints: {
                    0: {
                        slidesPerView: 2,
                    },
                    640: {
                        slidesPerView: 2,
                    },
                    768: {
                        slidesPerView: 4,
                    },
                    1024: {
                        slidesPerView: 4,
                    },
                },

            });
        </script>
    @endpush
    <!-- Hero: End -->
</x-front-layout>