<x-front-layout>
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
                <x-front.headline :headline="trans('front.our services')" subHeadline="Everything you need</span> to start your next project"
                    description="Not just a set of tools, the package includes ready-to-deploy conceptual application." />
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
                <x-front.headline :headline="trans('front.pricing plans')"
                    subHeadline="Tailored pricing plans</span> designed for
                    you"
                    description="All plans include 40+ advanced tools and features to boost your product.<br>Choose the best plan to
                    fit
                    your needs." />
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
                        <div @class([
                            'col-lg-6',
                            'col-xl-4 ' => $item->index < 3,
                            'col-xl-3' => $item->index >= 3,
                        ]) class="">
                            <div class="card">
                                <div class="card-header">
                                    <div class="text-center">
                                        <img src="{{ asset($item->thumbnail) }}" alt="paper airplane icon"
                                            class="mb-4 pb-2 scaleX-n1-rtl">
                                        <h4 class="mb-1">{{ $item->title }}</h4>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span
                                                class="price-monthly h1 text-primary fw-bold mb-0 d-none">${{ $item->monthly_price }}</span>
                                            <span
                                                class="price-yearly h1 text-primary fw-bold mb-0">${{ $item->monthly_price }}</span>
                                            <sub class="h6 text-muted mb-0 ms-1">/{{ trans('front.month') }}</sub>
                                        </div>
                                        <div class="position-relative pt-2">
                                            <div class="price-yearly text-muted price-yearly-toggle">$
                                                {{ $item->yearly_price }} / {{ trans('front.year') }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        @foreach ($item->properties as $value)
                                            <li>
                                                <h5>
                                                    <span
                                                        class="badge badge-center rounded-pill bg-label-primary p-0 me-2"><i
                                                            class="bx bx-check bx-xs"></i></span>
                                                    {{ $value }}
                                                </h5>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="d-grid mt-4 pt-3">
                                        <a href="#"
                                            class="btn btn-label-primary">{{ trans('front.get started') }}</a>
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
            <x-front.headline :headline="trans('front.statistics')" subHeadline="Let's work</span> together"
                description="Any question or remark? just write us a message" />
            <div class="row gy-3">
                <div class="col-sm-6 col-lg-3">
                    <div class="card border border-label-primary shadow-none">
                        <div class="card-body text-center">
                            <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/icons/laptop.png"
                                alt="laptop" class="mb-2">
                            <h5 class="h2 mb-1">{{ $counts?->corps_count }}</h5>
                            <p class="fw-medium mb-0">
                                المنشآة

                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="card border border-label-info shadow-none">
                        <div class="card-body text-center">
                            <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/icons/user-success.png"
                                alt="laptop" class="mb-2">
                            <h5 class="h2 mb-1">{{ $counts?->users_count }}</h5>
                            <p class="fw-medium mb-0">
                                عملاؤنا
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fun facts: End -->

    <!-- Logo Slider: Start -->
    {{-- <section>
        <div class="container">
            <div class="swiper-logo-carousel py-4 my-lg-2">
                <div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden"
                    id="swiper-clients-logos">
                    <div class="swiper-wrapper" id="swiper-wrapper-104d80328e2575d103" aria-live="off">
                        <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 5"
                            style="width: 144px;">
                            <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/branding/logo_1-light.png"
                                alt="client logo" class="client-logo"
                                data-app-light-img="front-pages/branding/logo_1-light.png"
                                data-app-dark-img="front-pages/branding/logo_1-dark.png">
                        </div>
                        <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 5"
                            style="width: 144px;">
                            <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/branding/logo_2-light.png"
                                alt="client logo" class="client-logo"
                                data-app-light-img="front-pages/branding/logo_2-light.png"
                                data-app-dark-img="front-pages/branding/logo_2-dark.png">
                        </div>
                        <div class="swiper-slide" role="group" aria-label="3 / 5" style="width: 144px;">
                            <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/branding/logo_3-light.png"
                                alt="client logo" class="client-logo"
                                data-app-light-img="front-pages/branding/logo_3-light.png"
                                data-app-dark-img="front-pages/branding/logo_3-dark.png">
                        </div>
                        <div class="swiper-slide" role="group" aria-label="4 / 5" style="width: 144px;">
                            <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/front-pages/branding/logo_4-light.png"
                                alt="client logo" class="client-logo"
                                data-app-light-img="front-pages/branding/logo_4-light.png"
                                data-app-dark-img="front-pages/branding/logo_4-dark.png">
                        </div>
                        <div class="swiper-slide" role="group" aria-label="5 / 5" style="width: 144px;">
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
    </section> --}}
    <!-- Logo Slider: End -->


    <!-- Contact Us: Start -->
    <section id="landingContact" class="section-py bg-body landing-contact">
        <div class="container">
            <x-front.headline :headline="trans('front.contact us')" subHeadline="Let's work</span> together"
                description="Any question or remark? just write us a message" />
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
                            <form>
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <x-dashboard.input-group type="text" name="name" :title="trans('table.columns.name')" />
                                    </div>
                                    <div class="col-md-6">
                                        <x-dashboard.input-group type="text" name="email" :title="trans('table.columns.email')" />
                                    </div>

                                    <div class="col-md-6">
                                        <x-dashboard.input-group type="text" name="phone" :title="trans('table.columns.phone')" />
                                    </div>

                                    <div class="col-md-6">
                                        <x-dashboard.input-group type="text" name="subject" :title="trans('table.columns.subject')" />
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label"
                                            for="contact-form-message">{{ trans('table.columns.message') }}</label>
                                        <textarea id="contact-form-message" class="form-control" rows="9"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit"
                                            class="btn btn-primary">{{ trans('common.send') }}</button>
                                    </div>
                                </div>
                            </form>
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

            .swiper-slide {
                text-align: center;
                font-size: 18px;
                background: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .swiper-slide img {
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
        </script>
    @endpush
    <!-- Hero: End -->
</x-front-layout>
