<x-app-layout>
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">مرحبا بك {{auth()->user()->name}} 🎉</h5>
                            <p class="mb-4">
                                مرحباً، هذا النظام خاص <span class="fw-bold text-primary">بشركة الناسخ</span> للخدمات وإستخدامك للنظام يعني بأنك موافق على <span class="fw-bold text-dark">السياسة والشروط والأحكام</span> للنظام
                            </p>

                            {{-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
                            {{-- <livewire:send-email-button /> --}}
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @hasPermission('notification.show')
        <div class="col-lg-4 col-md-4 order-1 mb-3">
            <livewire:dashboard.container.notifications-container theme="todo" />
        </div>
        @endhasPermission
    </div>
    <div class="row">
        <!-- Order Statistics -->
        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Order Statistics</h5>
                        <small class="text-muted">42.82k Total Sales</small>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3" style="position: relative;">
                        <div class="d-flex flex-column align-items-center gap-1">
                            <h2 class="mb-2">8,258</h2>
                            <span>Total Orders</span>
                        </div>
                        <div id="orderStatisticsChart" style="min-height: 137.55px;">
                            <div id="apexchartse5ldjzon"
                                class="apexcharts-canvas apexchartse5ldjzon apexcharts-theme-light"
                                style="width: 130px; height: 137.55px;"><svg id="SvgjsSvg4648" width="130"
                                    height="137.55" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                    class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                    style="background: transparent;">
                                    <g id="SvgjsG4650" class="apexcharts-inner apexcharts-graphical"
                                        transform="translate(-7, 0)">
                                        <defs id="SvgjsDefs4649">
                                            <clipPath id="gridRectMaske5ldjzon">
                                                <rect id="SvgjsRect4652" width="150" height="173"
                                                    x="-4.5" y="-2.5" rx="0" ry="0"
                                                    opacity="1" stroke-width="0" stroke="none"
                                                    stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <clipPath id="forecastMaske5ldjzon"></clipPath>
                                            <clipPath id="nonForecastMaske5ldjzon"></clipPath>
                                            <clipPath id="gridRectMarkerMaske5ldjzon">
                                                <rect id="SvgjsRect4653" width="145" height="172"
                                                    x="-2" y="-2" rx="0" ry="0"
                                                    opacity="1" stroke-width="0" stroke="none"
                                                    stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                        </defs>
                                        <g id="SvgjsG4654" class="apexcharts-pie">
                                            <g id="SvgjsG4655" transform="translate(0, 0) scale(1)">
                                                <circle id="SvgjsCircle4656" r="44.835365853658544" cx="70.5"
                                                    cy="70.5" fill="transparent"></circle>
                                                <g id="SvgjsG4657" class="apexcharts-slices">
                                                    <g id="SvgjsG4658"
                                                        class="apexcharts-series apexcharts-pie-series"
                                                        seriesName="Electronic" rel="1" data:realIndex="0">
                                                        <path id="SvgjsPath4659"
                                                            d="M 70.5 10.71951219512195 A 59.78048780487805 59.78048780487805 0 0 1 97.63977353321047 123.7648046533095 L 90.85483014990785 110.44860348998213 A 44.835365853658544 44.835365853658544 0 0 0 70.5 25.664634146341456 L 70.5 10.71951219512195 z"
                                                            fill="rgba(105,108,255,1)" fill-opacity="1"
                                                            stroke-opacity="1" stroke-linecap="butt"
                                                            stroke-width="5" stroke-dasharray="0"
                                                            class="apexcharts-pie-area apexcharts-donut-slice-0"
                                                            index="0" j="0" data:angle="153"
                                                            data:startAngle="0" data:strokeWidth="5"
                                                            data:value="85"
                                                            data:pathOrig="M 70.5 10.71951219512195 A 59.78048780487805 59.78048780487805 0 0 1 97.63977353321047 123.7648046533095 L 90.85483014990785 110.44860348998213 A 44.835365853658544 44.835365853658544 0 0 0 70.5 25.664634146341456 L 70.5 10.71951219512195 z"
                                                            stroke="#ffffff"></path>
                                                    </g>
                                                    <g id="SvgjsG4660"
                                                        class="apexcharts-series apexcharts-pie-series"
                                                        seriesName="Sports" rel="2" data:realIndex="1">
                                                        <path id="SvgjsPath4661"
                                                            d="M 97.63977353321047 123.7648046533095 A 59.78048780487805 59.78048780487805 0 0 1 70.5 130.28048780487805 L 70.5 115.33536585365854 A 44.835365853658544 44.835365853658544 0 0 0 90.85483014990785 110.44860348998213 L 97.63977353321047 123.7648046533095 z"
                                                            fill="rgba(133,146,163,1)" fill-opacity="1"
                                                            stroke-opacity="1" stroke-linecap="butt"
                                                            stroke-width="5" stroke-dasharray="0"
                                                            class="apexcharts-pie-area apexcharts-donut-slice-1"
                                                            index="0" j="1" data:angle="27"
                                                            data:startAngle="153" data:strokeWidth="5"
                                                            data:value="15"
                                                            data:pathOrig="M 97.63977353321047 123.7648046533095 A 59.78048780487805 59.78048780487805 0 0 1 70.5 130.28048780487805 L 70.5 115.33536585365854 A 44.835365853658544 44.835365853658544 0 0 0 90.85483014990785 110.44860348998213 L 97.63977353321047 123.7648046533095 z"
                                                            stroke="#ffffff"></path>
                                                    </g>
                                                    <g id="SvgjsG4662"
                                                        class="apexcharts-series apexcharts-pie-series"
                                                        seriesName="Decor" rel="3" data:realIndex="2">
                                                        <path id="SvgjsPath4663"
                                                            d="M 70.5 130.28048780487805 A 59.78048780487805 59.78048780487805 0 0 1 10.71951219512195 70.50000000000001 L 25.664634146341456 70.5 A 44.835365853658544 44.835365853658544 0 0 0 70.5 115.33536585365854 L 70.5 130.28048780487805 z"
                                                            fill="rgba(3,195,236,1)" fill-opacity="1"
                                                            stroke-opacity="1" stroke-linecap="butt"
                                                            stroke-width="5" stroke-dasharray="0"
                                                            class="apexcharts-pie-area apexcharts-donut-slice-2"
                                                            index="0" j="2" data:angle="90"
                                                            data:startAngle="180" data:strokeWidth="5"
                                                            data:value="50"
                                                            data:pathOrig="M 70.5 130.28048780487805 A 59.78048780487805 59.78048780487805 0 0 1 10.71951219512195 70.50000000000001 L 25.664634146341456 70.5 A 44.835365853658544 44.835365853658544 0 0 0 70.5 115.33536585365854 L 70.5 130.28048780487805 z"
                                                            stroke="#ffffff"></path>
                                                    </g>
                                                    <g id="SvgjsG4664"
                                                        class="apexcharts-series apexcharts-pie-series"
                                                        seriesName="Fashion" rel="4" data:realIndex="3">
                                                        <path id="SvgjsPath4665"
                                                            d="M 10.71951219512195 70.50000000000001 A 59.78048780487805 59.78048780487805 0 0 1 70.48956633664653 10.719513105630845 L 70.4921747524849 25.664634829223125 A 44.835365853658544 44.835365853658544 0 0 0 25.664634146341456 70.5 L 10.71951219512195 70.50000000000001 z"
                                                            fill="rgba(113,221,55,1)" fill-opacity="1"
                                                            stroke-opacity="1" stroke-linecap="butt"
                                                            stroke-width="5" stroke-dasharray="0"
                                                            class="apexcharts-pie-area apexcharts-donut-slice-3"
                                                            index="0" j="3" data:angle="90"
                                                            data:startAngle="270" data:strokeWidth="5"
                                                            data:value="50"
                                                            data:pathOrig="M 10.71951219512195 70.50000000000001 A 59.78048780487805 59.78048780487805 0 0 1 70.48956633664653 10.719513105630845 L 70.4921747524849 25.664634829223125 A 44.835365853658544 44.835365853658544 0 0 0 25.664634146341456 70.5 L 10.71951219512195 70.50000000000001 z"
                                                            stroke="#ffffff"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="SvgjsG4666" class="apexcharts-datalabels-group"
                                                transform="translate(0, 0) scale(1)"><text id="SvgjsText4667"
                                                    font-family="Helvetica, Arial, sans-serif" x="70.5"
                                                    y="90.5" text-anchor="middle" dominant-baseline="auto"
                                                    font-size="0.8125rem" font-weight="400" fill="#a1acb8"
                                                    class="apexcharts-text apexcharts-datalabel-label"
                                                    style="font-family: Helvetica, Arial, sans-serif;">Weekly</text><text
                                                    id="SvgjsText4668" font-family="Public Sans" x="70.5"
                                                    y="71.5" text-anchor="middle" dominant-baseline="auto"
                                                    font-size="1.5rem" font-weight="400" fill="#566a7f"
                                                    class="apexcharts-text apexcharts-datalabel-value"
                                                    style="font-family: &quot;Public Sans&quot;;">38%</text></g>
                                        </g>
                                        <line id="SvgjsLine4669" x1="0" y1="0" x2="141"
                                            y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                            stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                        </line>
                                        <line id="SvgjsLine4670" x1="0" y1="0" x2="141"
                                            y2="0" stroke-dasharray="0" stroke-width="0"
                                            stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                    </g>
                                    <g id="SvgjsG4651" class="apexcharts-annotations"></g>
                                </svg>
                                <div class="apexcharts-legend"></div>
                                <div class="apexcharts-tooltip apexcharts-theme-dark">
                                    <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                            class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(105, 108, 255);"></span>
                                        <div class="apexcharts-tooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-tooltip-series-group" style="order: 2;"><span
                                            class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(133, 146, 163);"></span>
                                        <div class="apexcharts-tooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-tooltip-series-group" style="order: 3;"><span
                                            class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(3, 195, 236);"></span>
                                        <div class="apexcharts-tooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-tooltip-series-group" style="order: 4;"><span
                                            class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(113, 221, 55);"></span>
                                        <div class="apexcharts-tooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 239px; height: 139px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class="bx bx-mobile-alt"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Electronic</h6>
                                    <small class="text-muted">Mobile, Earbuds, TV</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">82.5k</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-success"><i
                                        class="bx bx-closet"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Fashion</h6>
                                    <small class="text-muted">T-shirt, Jeans, Shoes</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">23.8k</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-info"><i
                                        class="bx bx-home-alt"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Decor</h6>
                                    <small class="text-muted">Fine Art, Dining</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">849k</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-secondary"><i
                                        class="bx bx-football"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Sports</h6>
                                    <small class="text-muted">Football, Cricket Kit</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">99</small>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Order Statistics -->

        <!-- Expense Overview -->
        <div class="col-md-6 col-lg-4 order-1 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-tabs-line-card-income"
                                aria-controls="navs-tabs-line-card-income" aria-selected="true">
                                Income
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab">Expenses</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab">Profit</button>
                        </li>
                    </ul>
                </div>
                <div class="card-body px-0">
                    <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel"
                            style="position: relative;">
                            <div class="d-flex p-4 pt-3">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="../assets/img/icons/unicons/wallet.png" alt="User">
                                </div>
                                <div>
                                    <small class="text-muted d-block">Total Balance</small>
                                    <div class="d-flex align-items-center">
                                        <h6 class="mb-0 me-1">$459.10</h6>
                                        <small class="text-success fw-semibold">
                                            <i class="bx bx-chevron-up"></i>
                                            42.9%
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div id="incomeChart" style="min-height: 215px;">
                                <div id="apexchartsijur691z"
                                    class="apexcharts-canvas apexchartsijur691z apexcharts-theme-light"
                                    style="width: 286px; height: 215px;"><svg id="SvgjsSvg4671" width="286"
                                        height="215" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                        class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS"
                                        transform="translate(0, 0)" style="background: transparent;">
                                        <g id="SvgjsG4673" class="apexcharts-inner apexcharts-graphical"
                                            transform="translate(0, 10)">
                                            <defs id="SvgjsDefs4672">
                                                <clipPath id="gridRectMaskijur691z">
                                                    <rect id="SvgjsRect4678" width="274.6875"
                                                        height="176.70079907417298" x="-3" y="-1"
                                                        rx="0" ry="0" opacity="1"
                                                        stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="forecastMaskijur691z"></clipPath>
                                                <clipPath id="nonForecastMaskijur691z"></clipPath>
                                                <clipPath id="gridRectMarkerMaskijur691z">
                                                    <rect id="SvgjsRect4679" width="296.6875"
                                                        height="202.70079907417298" x="-14" y="-14"
                                                        rx="0" ry="0" opacity="1"
                                                        stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fff"></rect>
                                                </clipPath>
                                                <linearGradient id="SvgjsLinearGradient4699" x1="0"
                                                    y1="0" x2="0" y2="1">
                                                    <stop id="SvgjsStop4700" stop-opacity="0.5"
                                                        stop-color="rgba(105,108,255,0.5)" offset="0">
                                                    </stop>
                                                    <stop id="SvgjsStop4701" stop-opacity="0.25"
                                                        stop-color="rgba(195,196,255,0.25)" offset="0.95">
                                                    </stop>
                                                    <stop id="SvgjsStop4702" stop-opacity="0.25"
                                                        stop-color="rgba(195,196,255,0.25)" offset="1">
                                                    </stop>
                                                </linearGradient>
                                            </defs>
                                            <line id="SvgjsLine4677" x1="0" y1="0"
                                                x2="0" y2="174.70079907417298" stroke="#b6b6b6"
                                                stroke-dasharray="3" stroke-linecap="butt"
                                                class="apexcharts-xcrosshairs" x="0" y="0"
                                                width="1" height="174.70079907417298" fill="#b1b9c4"
                                                filter="none" fill-opacity="0.9" stroke-width="1"></line>
                                            <g id="SvgjsG4705" class="apexcharts-xaxis"
                                                transform="translate(0, 0)">
                                                <g id="SvgjsG4706" class="apexcharts-xaxis-texts-g"
                                                    transform="translate(0, -4)"><text id="SvgjsText4708"
                                                        font-family="Helvetica, Arial, sans-serif" x="0"
                                                        y="203.70079907417298" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="13px"
                                                        font-weight="400" fill="#a1acb8"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan4709"></tspan>
                                                        <title></title>
                                                    </text><text id="SvgjsText4711"
                                                        font-family="Helvetica, Arial, sans-serif"
                                                        x="38.38392857142857" y="203.70079907417298"
                                                        text-anchor="middle" dominant-baseline="auto"
                                                        font-size="13px" font-weight="400" fill="#a1acb8"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan4712">Jan</tspan>
                                                        <title>Jan</title>
                                                    </text><text id="SvgjsText4714"
                                                        font-family="Helvetica, Arial, sans-serif"
                                                        x="76.76785714285714" y="203.70079907417298"
                                                        text-anchor="middle" dominant-baseline="auto"
                                                        font-size="13px" font-weight="400" fill="#a1acb8"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan4715">Feb</tspan>
                                                        <title>Feb</title>
                                                    </text><text id="SvgjsText4717"
                                                        font-family="Helvetica, Arial, sans-serif"
                                                        x="115.15178571428572" y="203.70079907417298"
                                                        text-anchor="middle" dominant-baseline="auto"
                                                        font-size="13px" font-weight="400" fill="#a1acb8"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan4718">Mar</tspan>
                                                        <title>Mar</title>
                                                    </text><text id="SvgjsText4720"
                                                        font-family="Helvetica, Arial, sans-serif"
                                                        x="153.53571428571428" y="203.70079907417298"
                                                        text-anchor="middle" dominant-baseline="auto"
                                                        font-size="13px" font-weight="400" fill="#a1acb8"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan4721">Apr</tspan>
                                                        <title>Apr</title>
                                                    </text><text id="SvgjsText4723"
                                                        font-family="Helvetica, Arial, sans-serif"
                                                        x="191.91964285714283" y="203.70079907417298"
                                                        text-anchor="middle" dominant-baseline="auto"
                                                        font-size="13px" font-weight="400" fill="#a1acb8"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan4724">May</tspan>
                                                        <title>May</title>
                                                    </text><text id="SvgjsText4726"
                                                        font-family="Helvetica, Arial, sans-serif"
                                                        x="230.3035714285714" y="203.70079907417298"
                                                        text-anchor="middle" dominant-baseline="auto"
                                                        font-size="13px" font-weight="400" fill="#a1acb8"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan4727">Jun</tspan>
                                                        <title>Jun</title>
                                                    </text><text id="SvgjsText4729"
                                                        font-family="Helvetica, Arial, sans-serif"
                                                        x="268.68749999999994" y="203.70079907417298"
                                                        text-anchor="middle" dominant-baseline="auto"
                                                        font-size="13px" font-weight="400" fill="#a1acb8"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan4730">Jul</tspan>
                                                        <title>Jul</title>
                                                    </text></g>
                                            </g>
                                            <g id="SvgjsG4733" class="apexcharts-grid">
                                                <g id="SvgjsG4734" class="apexcharts-gridlines-horizontal">
                                                    <line id="SvgjsLine4736" x1="0" y1="0"
                                                        x2="268.6875" y2="0" stroke="#eceef1"
                                                        stroke-dasharray="3" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine4737" x1="0"
                                                        y1="43.675199768543244" x2="268.6875"
                                                        y2="43.675199768543244" stroke="#eceef1"
                                                        stroke-dasharray="3" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine4738" x1="0" y1="87.35039953708649"
                                                        x2="268.6875" y2="87.35039953708649" stroke="#eceef1"
                                                        stroke-dasharray="3" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine4739" x1="0"
                                                        y1="131.02559930562973" x2="268.6875"
                                                        y2="131.02559930562973" stroke="#eceef1"
                                                        stroke-dasharray="3" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine4740" x1="0"
                                                        y1="174.70079907417298" x2="268.6875"
                                                        y2="174.70079907417298" stroke="#eceef1"
                                                        stroke-dasharray="3" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                </g>
                                                <g id="SvgjsG4735" class="apexcharts-gridlines-vertical"></g>
                                                <line id="SvgjsLine4742" x1="0" y1="174.70079907417298"
                                                    x2="268.6875" y2="174.70079907417298" stroke="transparent"
                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                <line id="SvgjsLine4741" x1="0" y1="1"
                                                    x2="0" y2="174.70079907417298" stroke="transparent"
                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                            </g>
                                            <g id="SvgjsG4680"
                                                class="apexcharts-area-series apexcharts-plot-series">
                                                <g id="SvgjsG4681" class="apexcharts-series" seriesName="seriesx1"
                                                    data:longestSeries="true" rel="1" data:realIndex="0">
                                                    <path id="SvgjsPath4703"
                                                        d="M 0 174.70079907417298L 0 113.55551939821244C 13.434375 113.55551939821244 24.94955357142857 126.65807932877541 38.38392857142857 126.65807932877541C 51.81830357142857 126.65807932877541 63.333482142857136 87.3503995370865 76.76785714285714 87.3503995370865C 90.20223214285714 87.3503995370865 101.7174107142857 122.29055935192109 115.15178571428571 122.29055935192109C 128.5861607142857 122.29055935192109 140.1013392857143 34.9401598148346 153.53571428571428 34.9401598148346C 166.97008928571427 34.9401598148346 178.48526785714284 104.82047944450379 191.91964285714286 104.82047944450379C 205.35401785714285 104.82047944450379 216.86919642857143 65.51279965281486 230.30357142857142 65.51279965281486C 243.73794642857143 65.51279965281486 255.253125 91.71791951394081 268.6875 91.71791951394081C 268.6875 91.71791951394081 268.6875 91.71791951394081 268.6875 174.70079907417298M 268.6875 91.71791951394081z"
                                                        fill="url(#SvgjsLinearGradient4699)" fill-opacity="1"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                        stroke-dasharray="0" class="apexcharts-area"
                                                        index="0" clip-path="url(#gridRectMaskijur691z)"
                                                        pathTo="M 0 174.70079907417298L 0 113.55551939821244C 13.434375 113.55551939821244 24.94955357142857 126.65807932877541 38.38392857142857 126.65807932877541C 51.81830357142857 126.65807932877541 63.333482142857136 87.3503995370865 76.76785714285714 87.3503995370865C 90.20223214285714 87.3503995370865 101.7174107142857 122.29055935192109 115.15178571428571 122.29055935192109C 128.5861607142857 122.29055935192109 140.1013392857143 34.9401598148346 153.53571428571428 34.9401598148346C 166.97008928571427 34.9401598148346 178.48526785714284 104.82047944450379 191.91964285714286 104.82047944450379C 205.35401785714285 104.82047944450379 216.86919642857143 65.51279965281486 230.30357142857142 65.51279965281486C 243.73794642857143 65.51279965281486 255.253125 91.71791951394081 268.6875 91.71791951394081C 268.6875 91.71791951394081 268.6875 91.71791951394081 268.6875 174.70079907417298M 268.6875 91.71791951394081z"
                                                        pathFrom="M -1 218.37599884271623L -1 218.37599884271623L 38.38392857142857 218.37599884271623L 76.76785714285714 218.37599884271623L 115.15178571428571 218.37599884271623L 153.53571428571428 218.37599884271623L 191.91964285714286 218.37599884271623L 230.30357142857142 218.37599884271623L 268.6875 218.37599884271623">
                                                    </path>
                                                    <path id="SvgjsPath4704"
                                                        d="M 0 113.55551939821244C 13.434375 113.55551939821244 24.94955357142857 126.65807932877541 38.38392857142857 126.65807932877541C 51.81830357142857 126.65807932877541 63.333482142857136 87.3503995370865 76.76785714285714 87.3503995370865C 90.20223214285714 87.3503995370865 101.7174107142857 122.29055935192109 115.15178571428571 122.29055935192109C 128.5861607142857 122.29055935192109 140.1013392857143 34.9401598148346 153.53571428571428 34.9401598148346C 166.97008928571427 34.9401598148346 178.48526785714284 104.82047944450379 191.91964285714286 104.82047944450379C 205.35401785714285 104.82047944450379 216.86919642857143 65.51279965281486 230.30357142857142 65.51279965281486C 243.73794642857143 65.51279965281486 255.253125 91.71791951394081 268.6875 91.71791951394081"
                                                        fill="none" fill-opacity="1" stroke="#696cff"
                                                        stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                                        stroke-dasharray="0" class="apexcharts-area"
                                                        index="0" clip-path="url(#gridRectMaskijur691z)"
                                                        pathTo="M 0 113.55551939821244C 13.434375 113.55551939821244 24.94955357142857 126.65807932877541 38.38392857142857 126.65807932877541C 51.81830357142857 126.65807932877541 63.333482142857136 87.3503995370865 76.76785714285714 87.3503995370865C 90.20223214285714 87.3503995370865 101.7174107142857 122.29055935192109 115.15178571428571 122.29055935192109C 128.5861607142857 122.29055935192109 140.1013392857143 34.9401598148346 153.53571428571428 34.9401598148346C 166.97008928571427 34.9401598148346 178.48526785714284 104.82047944450379 191.91964285714286 104.82047944450379C 205.35401785714285 104.82047944450379 216.86919642857143 65.51279965281486 230.30357142857142 65.51279965281486C 243.73794642857143 65.51279965281486 255.253125 91.71791951394081 268.6875 91.71791951394081"
                                                        pathFrom="M -1 218.37599884271623L -1 218.37599884271623L 38.38392857142857 218.37599884271623L 76.76785714285714 218.37599884271623L 115.15178571428571 218.37599884271623L 153.53571428571428 218.37599884271623L 191.91964285714286 218.37599884271623L 230.30357142857142 218.37599884271623L 268.6875 218.37599884271623">
                                                    </path>
                                                    <g id="SvgjsG4682" class="apexcharts-series-markers-wrap"
                                                        data:realIndex="0">
                                                        <g id="SvgjsG4684" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMaskijur691z)">
                                                            <circle id="SvgjsCircle4685" r="6"
                                                                cx="0" cy="113.55551939821244"
                                                                class="apexcharts-marker no-pointer-events w8p0r7sral"
                                                                stroke="transparent" fill="transparent"
                                                                fill-opacity="1" stroke-width="4"
                                                                stroke-opacity="0.9" rel="0" j="0"
                                                                index="0" default-marker-size="6"></circle>
                                                            <circle id="SvgjsCircle4686" r="6"
                                                                cx="38.38392857142857" cy="126.65807932877541"
                                                                class="apexcharts-marker no-pointer-events w9dutiohu"
                                                                stroke="transparent" fill="transparent"
                                                                fill-opacity="1" stroke-width="4"
                                                                stroke-opacity="0.9" rel="1" j="1"
                                                                index="0" default-marker-size="6"></circle>
                                                        </g>
                                                        <g id="SvgjsG4687" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMaskijur691z)">
                                                            <circle id="SvgjsCircle4688" r="6"
                                                                cx="76.76785714285714" cy="87.3503995370865"
                                                                class="apexcharts-marker no-pointer-events wmljvk6gw"
                                                                stroke="transparent" fill="transparent"
                                                                fill-opacity="1" stroke-width="4"
                                                                stroke-opacity="0.9" rel="2" j="2"
                                                                index="0" default-marker-size="6"></circle>
                                                        </g>
                                                        <g id="SvgjsG4689" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMaskijur691z)">
                                                            <circle id="SvgjsCircle4690" r="6"
                                                                cx="115.15178571428571" cy="122.29055935192109"
                                                                class="apexcharts-marker no-pointer-events wrlwqcqpx"
                                                                stroke="transparent" fill="transparent"
                                                                fill-opacity="1" stroke-width="4"
                                                                stroke-opacity="0.9" rel="3" j="3"
                                                                index="0" default-marker-size="6"></circle>
                                                        </g>
                                                        <g id="SvgjsG4691" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMaskijur691z)">
                                                            <circle id="SvgjsCircle4692" r="6"
                                                                cx="153.53571428571428" cy="34.9401598148346"
                                                                class="apexcharts-marker no-pointer-events wi7qx3g4zk"
                                                                stroke="transparent" fill="transparent"
                                                                fill-opacity="1" stroke-width="4"
                                                                stroke-opacity="0.9" rel="4" j="4"
                                                                index="0" default-marker-size="6"></circle>
                                                        </g>
                                                        <g id="SvgjsG4693" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMaskijur691z)">
                                                            <circle id="SvgjsCircle4694" r="6"
                                                                cx="191.91964285714286" cy="104.82047944450379"
                                                                class="apexcharts-marker no-pointer-events wcfjb1hbj"
                                                                stroke="transparent" fill="transparent"
                                                                fill-opacity="1" stroke-width="4"
                                                                stroke-opacity="0.9" rel="5" j="5"
                                                                index="0" default-marker-size="6"></circle>
                                                        </g>
                                                        <g id="SvgjsG4695" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMaskijur691z)">
                                                            <circle id="SvgjsCircle4696" r="6"
                                                                cx="230.30357142857142" cy="65.51279965281486"
                                                                class="apexcharts-marker no-pointer-events w3sao9m3u"
                                                                stroke="transparent" fill="transparent"
                                                                fill-opacity="1" stroke-width="4"
                                                                stroke-opacity="0.9" rel="6" j="6"
                                                                index="0" default-marker-size="6"></circle>
                                                        </g>
                                                        <g id="SvgjsG4697" class="apexcharts-series-markers"
                                                            clip-path="url(#gridRectMarkerMaskijur691z)">
                                                            <circle id="SvgjsCircle4698" r="6"
                                                                cx="268.6875" cy="91.71791951394081"
                                                                class="apexcharts-marker no-pointer-events w6qy0jjdjg"
                                                                stroke="#696cff" fill="#ffffff" fill-opacity="1"
                                                                stroke-width="4" stroke-opacity="0.9"
                                                                rel="7" j="7" index="0"
                                                                default-marker-size="6"></circle>
                                                        </g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG4683" class="apexcharts-datalabels"
                                                    data:realIndex="0"></g>
                                            </g>
                                            <line id="SvgjsLine4743" x1="0" y1="0"
                                                x2="268.6875" y2="0" stroke="#b6b6b6"
                                                stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine4744" x1="0" y1="0"
                                                x2="268.6875" y2="0" stroke-dasharray="0"
                                                stroke-width="0" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG4745" class="apexcharts-yaxis-annotations"></g>
                                            <g id="SvgjsG4746" class="apexcharts-xaxis-annotations"></g>
                                            <g id="SvgjsG4747" class="apexcharts-point-annotations"></g>
                                            <rect id="SvgjsRect4748" width="0" height="0"
                                                x="0" y="0" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none"
                                                stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect">
                                            </rect>
                                            <rect id="SvgjsRect4749" width="0" height="0"
                                                x="0" y="0" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none"
                                                stroke-dasharray="0" fill="#fefefe"
                                                class="apexcharts-selection-rect"></rect>
                                        </g>
                                        <rect id="SvgjsRect4676" width="0" height="0" x="0"
                                            y="0" rx="0" ry="0" opacity="1"
                                            stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe">
                                        </rect>
                                        <g id="SvgjsG4731" class="apexcharts-yaxis" rel="0"
                                            transform="translate(-8, 0)">
                                            <g id="SvgjsG4732" class="apexcharts-yaxis-texts-g"></g>
                                        </g>
                                        <g id="SvgjsG4674" class="apexcharts-annotations"></g>
                                    </svg>
                                    <div class="apexcharts-legend" style="max-height: 107.5px;"></div>
                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                        <div class="apexcharts-tooltip-title"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        </div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(105, 108, 255);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                        class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                        <div class="apexcharts-xaxistooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        </div>
                                    </div>
                                    <div
                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                        <div class="apexcharts-yaxistooltip-text"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center pt-4 gap-2">
                                <div class="flex-shrink-0" style="position: relative;">
                                    <div id="expensesOfWeek" style="min-height: 57.7px;">
                                        <div id="apexchartsqxk1reli"
                                            class="apexcharts-canvas apexchartsqxk1reli apexcharts-theme-light"
                                            style="width: 60px; height: 57.7px;"><svg id="SvgjsSvg4750"
                                                width="60" height="57.7" xmlns="http://www.w3.org/2000/svg"
                                                version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                style="background: transparent;">
                                                <g id="SvgjsG4752" class="apexcharts-inner apexcharts-graphical"
                                                    transform="translate(-10, -10)">
                                                    <defs id="SvgjsDefs4751">
                                                        <clipPath id="gridRectMaskqxk1reli">
                                                            <rect id="SvgjsRect4754" width="86" height="87"
                                                                x="-3" y="-1" rx="0"
                                                                ry="0" opacity="1" stroke-width="0"
                                                                stroke="none" stroke-dasharray="0"
                                                                fill="#fff"></rect>
                                                        </clipPath>
                                                        <clipPath id="forecastMaskqxk1reli"></clipPath>
                                                        <clipPath id="nonForecastMaskqxk1reli"></clipPath>
                                                        <clipPath id="gridRectMarkerMaskqxk1reli">
                                                            <rect id="SvgjsRect4755" width="84" height="89"
                                                                x="-2" y="-2" rx="0"
                                                                ry="0" opacity="1" stroke-width="0"
                                                                stroke="none" stroke-dasharray="0"
                                                                fill="#fff"></rect>
                                                        </clipPath>
                                                    </defs>
                                                    <g id="SvgjsG4756" class="apexcharts-radialbar">
                                                        <g id="SvgjsG4757">
                                                            <g id="SvgjsG4758" class="apexcharts-tracks">
                                                                <g id="SvgjsG4759"
                                                                    class="apexcharts-radialbar-track apexcharts-track"
                                                                    rel="1">
                                                                    <path id="apexcharts-radialbarTrack-0"
                                                                        d="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 39.99617740968999 18.098171065291247"
                                                                        fill="none" fill-opacity="1"
                                                                        stroke="rgba(236,238,241,0.85)"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="2.0408536585365864"
                                                                        stroke-dasharray="0"
                                                                        class="apexcharts-radialbar-area"
                                                                        data:pathOrig="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 39.99617740968999 18.098171065291247">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG4761">
                                                                <g id="SvgjsG4765"
                                                                    class="apexcharts-series apexcharts-radial-series"
                                                                    seriesName="seriesx1" rel="1"
                                                                    data:realIndex="0">
                                                                    <path id="SvgjsPath4766"
                                                                        d="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 22.2810479140526 52.873572242130095"
                                                                        fill="none" fill-opacity="0.85"
                                                                        stroke="rgba(105,108,255,0.85)"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="4.081707317073173"
                                                                        stroke-dasharray="0"
                                                                        class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                                        data:angle="234" data:value="65"
                                                                        index="0" j="0"
                                                                        data:pathOrig="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 22.2810479140526 52.873572242130095">
                                                                    </path>
                                                                </g>
                                                                <circle id="SvgjsCircle4762" r="18.881402439024395"
                                                                    cx="40" cy="40"
                                                                    class="apexcharts-radialbar-hollow"
                                                                    fill="transparent"></circle>
                                                                <g id="SvgjsG4763"
                                                                    class="apexcharts-datalabels-group"
                                                                    transform="translate(0, 0) scale(1)"
                                                                    style="opacity: 1;"><text id="SvgjsText4764"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="40" y="45"
                                                                        text-anchor="middle"
                                                                        dominant-baseline="auto" font-size="13px"
                                                                        font-weight="400" fill="#697a8d"
                                                                        class="apexcharts-text apexcharts-datalabel-value"
                                                                        style="font-family: Helvetica, Arial, sans-serif;">$65</text>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                    <line id="SvgjsLine4767" x1="0" y1="0"
                                                        x2="80" y2="0" stroke="#b6b6b6"
                                                        stroke-dasharray="0" stroke-width="1"
                                                        stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                    </line>
                                                    <line id="SvgjsLine4768" x1="0" y1="0"
                                                        x2="80" y2="0" stroke-dasharray="0"
                                                        stroke-width="0" stroke-linecap="butt"
                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                </g>
                                                <g id="SvgjsG4753" class="apexcharts-annotations"></g>
                                            </svg>
                                            <div class="apexcharts-legend"></div>
                                        </div>
                                    </div>
                                    <div class="resize-triggers">
                                        <div class="expand-trigger">
                                            <div style="width: 61px; height: 59px;"></div>
                                        </div>
                                        <div class="contract-trigger"></div>
                                    </div>
                                </div>
                                <div>
                                    <p class="mb-n1 mt-1">Expenses This Week</p>
                                    <small class="text-muted">$39 less than last week</small>
                                </div>
                            </div>
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 287px; height: 377px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Expense Overview -->

        <!-- Transactions -->
        <div class="col-md-6 col-lg-4 order-2 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Transactions</h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../assets/img/icons/unicons/paypal.png" alt="User" class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">Paypal</small>
                                    <h6 class="mb-0">Send money</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">+82.6</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">Wallet</small>
                                    <h6 class="mb-0">Mac'D</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">+270.69</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../assets/img/icons/unicons/chart.png" alt="User" class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">Transfer</small>
                                    <h6 class="mb-0">Refund</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">+637.91</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../assets/img/icons/unicons/cc-success.png" alt="User"
                                    class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">Credit Card</small>
                                    <h6 class="mb-0">Ordered Food</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">-838.71</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">Wallet</small>
                                    <h6 class="mb-0">Starbucks</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">+203.33</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../assets/img/icons/unicons/cc-warning.png" alt="User"
                                    class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">Mastercard</small>
                                    <h6 class="mb-0">Ordered Food</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">-92.45</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Transactions -->
    </div>

    @push('scripts')
        <script>
            const notificationScrolling = new PerfectScrollbar(document.querySelector('#notification-scrolling'))
        </script>
    @endpush

</x-app-layout>
