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
                <div class="swiper" id="swiper" dir="{{ app()->getLocale() === 'en' ? 'ltr' : 'rtl' }}">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($sliders as $item)
                            <div class="swiper-slide" data-swiper-autoplay="{{ $item->get_delay * 1000 ?? 1 }}">
                                <div data-src="{{ asset($item->get_thumbnail) }}" alt="slider-{{ $item->id }}"
                                    class="img" style="background-image: url({{ asset($item->get_thumbnail) }})">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                    <div class="autoplay-progress">
                        <svg viewBox="0 0 48 48">
                            <circle cx="24" cy="24" r="20"></circle>
                        </svg>
                        <span></span>
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
                                <img src="{{ asset($item->thumbnail) }}" alt="laptop charging" width="65"
                                    height="65">
                            </div>
                            <h5 class="mb-3">{{ $item->get_title }}</h5>
                            @if ($item->description)
                                <p class="features-icon-description">
                                    {{ $item->get_description }}
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
                            <div class="card h-100">
                                <div class="card-header">
                                    <div class="text-center">
                                        <img src="{{ asset($item->thumbnail) }}" alt="paper airplane icon"
                                            class="mb-4 pb-2 scaleX-n1-rtl" width="88" height="96">
                                        <h4 class="mb-1 {{ $item->yearly_price == 0 ? 'fs-2' : '' }}">
                                            {{ $item->get_title }}</h4>
                                        <div class="d-flex align-items-center justify-content-center">
                                            @if ($item->yearly_price == 0)
                                                <span class="h5 text-primary fw-bold mb-0">
                                                    {{ trans('front.contact us') }}
                                                </span>
                                            @else
                                                <span
                                                    class="price-monthly h4 text-primary fw-bold mb-0 d-none">{{ $item->yearly_price }}{{ trans('common.sar') }}</span>
                                                <span
                                                    class="price-yearly h4 text-primary fw-bold mb-0">{{ $item->yearly_price }}{{ trans('common.sar') }}</span>
                                                <sub class="h6 text-muted mb-0 ms-1">/{{ trans('front.year') }}</sub>
                                            @endif
                                        </div>
                                        {{-- <div class="position-relative pt-2">
                                            <div class="price-yearly text-muted price-yearly-toggle">$
                                                {{ $item->yearly_price }} / {{ trans('front.year') }}</div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column align-items-start justify-content-between">
                                    <ul class="list-unstyled">
                                        @foreach ($item->get_properties as $value)
                                            <li>
                                                <h5 class="fs-6">
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
                                    <div class="w-100 d-grid mt-4 pt-3">
                                        @if ($item->yearly_price == 0)
                                            <a href="{{ route('packages.request', $item) }}"
                                                class="btn btn-label-primary">{{ trans('front.contact us') }}</a>
                                        @else
                                            <a href="{{ route('packages.request', $item) }}"
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

    @if (count($services) > 0)
        <!-- Pricing plans: Start -->
        <section class="section-py bg-body" id="services">
            <div class="container">
                <x-front.headline :headline="$getHeadline('services', 'title')" :subHeadline="$getHeadline('services', 'subtitle')" :description="$getHeadline('services', 'description')" />

                <div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden" id="swiper-services">
                    <div class="swiper-wrapper">
                        @foreach ($services as $service)
                            <div class="swiper-slide">
                                <x-dashboard.cards.service-card :service="$service" />
                            </div>
                        @endforeach
                    </div>

                    <div class="swiper-button-prev btn btn-icon btn-label-warning px-5 text-black">
                        <i class="tf-icons bx bx-right-arrow-alt fs-4"></i>
                    </div>
                    <div class="swiper-button-next btn btn-icon btn-label-warning px-5 text-black">
                        <i class="tf-icons bx bx-left-arrow-alt fs-4"></i>
                    </div>
                </div>
                <div class="w-full d-flex justify-content-end">
                    <a href="{{route('front.services.index')}}" class="btn btn-label-primary btn-lg">{{ trans('common.show more')
                        }}</a>
                </div>
            </div>
        </section>
        <!-- Pricing plans: End -->
    @endif

    <!-- CTA: Start -->
    <section id="landingCTA" class="section-py landing-cta p-lg-0 pb-0">
        <div class="container">
            <div class="row align-items-center gy-5 gy-lg-0">
                <div class="col-lg-6 text-center text-lg-start">
                    <h6 class="h2 text-primary fw-bold mb-1">Ready to Get Started?</h6>
                    <p class="fw-medium mb-4">Start your project with a 14-day free trial</p>
                    <a href="{{ setting('cta_link') }}" class="btn btn-primary">Get Started</a>
                </div>
                <div class="col-lg-6 pt-lg-5 text-center text-lg-end">
                    <img src="{{ asset(setting('cta_file')) }}" alt="cta dashboard" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- CTA: End -->

    <!-- Real customers reviews: Start -->
    @if (count($reviews) > 0)
        <section id="landingReviews" class="section-py bg-body landing-reviews pb-0">
            <!-- What people say slider: Start -->
            <div class="container">
                <div class="row align-items-center gx-0 gy-4 g-lg-5">
                    <div class="col-md-6 col-lg-5 col-xl-3">
                        <x-front.headline :headline="$getHeadline('testimonials', 'title')" :subHeadline="$getHeadline('testimonials', 'subtitle')" :description="$getHeadline('testimonials', 'description')" />
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
                                <div class="swiper-wrapper" id="swiper-wrapper-0f1b91be13d10894c" aria-live="off"
                                    style="cursor: grab; transition-duration: 0ms; transform: translate3d(-795px, 0px, 0px);">
                                    @foreach ($reviews as $item)
                                        <div class="swiper-slide" role="group"
                                            style="width: 245px; margin-right: 20px;">
                                            <div class="card h-100">
                                                <div
                                                    class="card-body text-body d-flex flex-column justify-content-between h-100">
                                                    <p>
                                                        “{{ $item->comment }}”
                                                    </p>
                                                    <div class="text-warning mb-3">
                                                        <div class="rating-container"
                                                            data-rating="{{ $item->rate }}"
                                                            id="rateYo-{{ $item->id }}"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next" tabindex="0" role="button"
                                    aria-label="Next slide" aria-controls="swiper-wrapper-0f1b91be13d10894c"></div>
                                <div class="swiper-button-prev" tabindex="0" role="button"
                                    aria-label="Previous slide" aria-controls="swiper-wrapper-0f1b91be13d10894c">
                                </div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- What people say slider: End -->
        </section>
    @endif
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
                                                class="client-logo d-block mx-auto" style="height: 5.5rem !important">
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
                        <img src="{{ asset(setting('contact_img')) }}" alt="contact customer service"
                            class="contact-img w-100 scaleX-n1-rtl img-fluid">
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
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

            .autoplay-progress {
                position: absolute;
                right: 16px;
                bottom: 16px;
                z-index: 10;
                width: 48px;
                height: 48px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
                color: #6b3c1f;
                /* var(--swiper-theme-color); */
            }

            .autoplay-progress svg {
                --progress: 0;
                position: absolute;
                left: 0;
                top: 0px;
                z-index: 10;
                width: 100%;
                height: 100%;
                stroke-width: 4px;
                stroke: #6b3c1f;
                /* var(--swiper-theme-color); */
                fill: none;
                stroke-dashoffset: calc(125.6 * (1 - var(--progress)));
                stroke-dasharray: 125.6;
                transform: rotate(-90deg);
            }

            .swiper-button-next,
            .swiper-rtl .swiper-button-prev {
                color: #6b3c1f !important;
            }

            .swiper-pagination-bullet.swiper-pagination-bullet-active,
            .swiper-pagination.swiper-pagination-progressbar .swiper-pagination-progressbar-fill {
                background-color: #6b3c1f !important;
            }

            #swiper-services .swiper-button-next:after, #swiper-services .swiper-rtl .swiper-button-prev:after,
            #swiper-services .swiper-button-prev:after, #swiper-services .swiper-rtl .swiper-button-next:after  {
                content: '' !important;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
        <script defer>
            const progressCircle = document.querySelector(".autoplay-progress svg");
            const progressContent = document.querySelector(".autoplay-progress span");

            var heroSwiper = new Swiper('#swiper', {
                // Optional parameters
                // direction: 'vertical',
                loop: true,
                centeredSlides: true,

                autoplay: {
                    // delay: 2500,
                    disableOnInteraction: true,
                },

                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
                },
                on: {
                    autoplayTimeLeft(s, time, progress) {
                        progressCircle.style.setProperty("--progress", 1 - progress);
                        progressContent.textContent = `${Math.ceil(time / 1000)}s`;
                    }
                }

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

            var servicesSwiper = new Swiper('#swiper-services', {
                // Optional parameters
                // direction: 'vertical',
                loop: true,
                slidesPerView: 4,
                spaceBetween: 20,
                autoplay: {
                    delay: 1500,
                    disableOnInteraction: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
                },
                // freeMode: true,

                breakpoints: {
                    0: {
                        slidesPerView: 1,
                    },
                    640: {
                        slidesPerView: 2,
                    },
                    768: {
                        slidesPerView: 3,
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
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },

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

        <script defer>
            const ratingContainer = $('.rating-container');

            if (ratingContainer.length) {
                ratingContainer.each(function() {
                    const rating = $(this).attr('data-rating');
                    $(this).rateYo({
                        rating: rating,
                        starWidth: "20px",
                        readOnly: true,
                        rtl: true
                    });
                });
            }

            const services = $('#swiper-services');

            let max = 0;
            services.find('.swiper-slide').each(function () {
                const currentEleHeight = $(this).children().first().height();

                if(currentEleHeight > max)
                    max = currentEleHeight;

                console.log(max);

            });

            services.css({'height': `${max + 10}px`});


        </script>
    @endpush

    <!-- Hero: End -->
</x-front-layout>
