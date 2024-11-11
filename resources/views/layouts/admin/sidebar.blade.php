@php
    $notifications = collect(
        auth()->user()->hasRole('admin')
            ? auth()->user()?->unreadNotifications()->where('type', 'App\Notifications\ClientActionNotification')->get()
            : [],
    )->pluck('data');

    // $servicesRequestsCount = $notifications->where('type', 'App\Models\ServiceRequest')->count();
    $jobsRequestsCount = $notifications->where('model', 'App\Models\JobRequest')->count();
    $contactsCount = $notifications->where('model', 'App\Models\ContactUs')->count();
    $packagesRequestCount = $notifications->where('model', 'App\Models\SubscribePackageRequest')->count();
    $subscribersCount = $notifications->where('model', 'App\Models\Subscriber')->count();
    $servicesRequestsCount = $notifications->where('model', 'Modules\Service\App\Models\ServiceRequest')->count();
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme">
    <div class="app-brand demo d-flex align-items-center justify-content-center">
        <a href="@hasPermission('dashboard.show')
{{ route('dashboard') }}
@else
#!
@endhasPermission"
            class="app-brand-link">
            <span class="app-brand-logo demo">
                {{-- <x-dashboard.logo width="25" /> --}}
                <img src="{{ session('theme') === 'dark' ? asset('assets/img/logo-white.png') : asset(setting('logo')) }}"
                    alt="logo" width="75" class="">
            </span>
            {{-- <span class="app-brand-text demo menu-text fw-bolder ms-2">{{ setting('app_name') }}</span> --}}
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 ps ps--active-y">

        {{-- @hasPermission('dashboard.show') --}}
        <x-dashboard.sidebar.link :title="trans('sidebar.home')" icon="home-circle" :link="route('dashboard')" />
        {{-- @endhasPermission --}}

        @hasPermission('notification.show')
            <x-dashboard.sidebar.link :title="trans('sidebar.notifications')" icon="bell" :link="route('users.notifications')" />
        @endhasPermission

        @hasPermission('corp.show|setting.show|monthly_update.show|registry.show|entity.show')
            <x-dashboard.sidebar.link :title="trans('sidebar.corps')" icon="folder" link="#" :hasSubMenu="true">
                @hasPermission('corp.show')
                    <x-dashboard.sidebar.link :title="trans('sidebar.corps')" :link="route('corps.index')" />
                @endhasPermission
                @hasPermission('monthly_update.show')
                    <x-dashboard.sidebar.link :title="trans('sidebar.monthly quarterly updates')" :link="route('monthly-quarterly-update.index')" />
                @endhasPermission
                @hasPermission('registry.show')
                    <x-dashboard.sidebar.link :title="trans('sidebar.registries')" :link="route('registries.index')" />
                @endhasPermission

                @hasPermission('entity.show')
                    <x-dashboard.sidebar.link :title="trans('sidebar.ministries')" :link="route('ministries.index')" />
                @endhasPermission
            </x-dashboard.sidebar.link>
        @endhasPermission

        @hasPermission('user.show|setting.show|slider.show')
            <x-dashboard.sidebar.link-head>
                <span>{{ trans('sidebar.all settings') }}</span>
            </x-dashboard.sidebar.link-head>
        @endhasPermission

        @hasPermission('user.show|role.show|setting.show')
            <x-dashboard.sidebar.link :title="trans('sidebar.settings')" icon="cog" link="#" :hasSubMenu="true">
                @hasPermission('user.show')
                    <x-dashboard.sidebar.link :title="trans('sidebar.users')" :link="route('users.index')" />
                @endhasPermission
                @hasPermission('role.show')
                    <x-dashboard.sidebar.link :title="trans('sidebar.roles')" :link="route('roles.index')" />
                @endhasPermission
                @hasPermission('setting.show')
                    <x-dashboard.sidebar.link :title="trans('sidebar.general settings')" :link="route('settings.index')" />
                @endhasPermission
                @hasPermission('slider.show')
                    <x-dashboard.sidebar.link :title="trans('sidebar.sliders')" :link="route('sliders.index')" />
                @endhasPermission
                <x-dashboard.sidebar.link :title="trans('sidebar.our specials')" :link="route('our-services.index')" />
                <x-dashboard.sidebar.link :title="trans('sidebar.our clients')" :link="route('our-clients.index')" />
                <x-dashboard.sidebar.link :title="trans('sidebar.headlines')" :link="route('translation.index')" />
                <x-dashboard.sidebar.link :title="trans('sidebar.statistics')" :link="route('statistics.index')" />
            </x-dashboard.sidebar.link>
        @endhasPermission

        @hasPermission('job.show|job_request.show|city.show')
            <x-dashboard.sidebar.link :title="trans('sidebar.jobs')" icon="server" link="#" :hasSubMenu="true"
                :notification="$jobsRequestsCount">
                @hasPermission('job.show')
                    <x-dashboard.sidebar.link :title="trans('sidebar.jobs')" :link="route('jobs.index')" />
                @endhasPermission
                @hasPermission('job_request.show')
                    <x-dashboard.sidebar.link :title="trans('sidebar.job requests')" :link="route('job-requests.index')" :notification="$jobsRequestsCount" />
                @endhasPermission
                @hasPermission('city.show')
                    <x-dashboard.sidebar.link :title="trans('sidebar.cities')" :link="route('job-cities.index')" />
                @endhasPermission
            </x-dashboard.sidebar.link>
        @endhasPermission


        @hasPermission('package.show|package_request.show')
            <x-dashboard.sidebar.link :title="trans('sidebar.packages')" icon="package" link="#" :hasSubMenu="true"
                :notification="$packagesRequestCount">
                @hasPermission('package.show')
                    <x-dashboard.sidebar.link :title="trans('sidebar.packages')" :link="route('packages.index')" />
                @endhasPermission
                @hasPermission('package_request.show')
                    <x-dashboard.sidebar.link :title="trans('sidebar.package requests')" :link="route('packages.requests')" :notification="$packagesRequestCount" />
                @endhasPermission
            </x-dashboard.sidebar.link>
        @endhasPermission

        @hasPermission('subscriber.show')
            <x-dashboard.sidebar.link :title="trans('sidebar.subscribers')" icon="user" :link="route('subscribers.index')" :notification="$subscribersCount" />
        @endhasPermission
        @hasPermission('contact.show')
            <x-dashboard.sidebar.link :title="trans('sidebar.contact us')" icon="user-pin" :link="route('contact-us.index')" :notification="$contactsCount" />
        @endhasPermission
        @hasPermission('review.show')
            <x-dashboard.sidebar.link :title="trans('sidebar.reviews')" icon="star" :link="route('reviews.index')" />
        @endhasPermission
        @hasPermission('service.show')
            <x-dashboard.sidebar.link :title="trans('sidebar.services')" icon="server" link="#" :hasSubMenu="true"
                :notification="$servicesRequestsCount">
                <x-dashboard.sidebar.link :title="trans('sidebar.services')" :link="route('services.index')" />
                <x-dashboard.sidebar.link :title="trans('sidebar.package requests')" :link="route('services.requests')" :notification="$servicesRequestsCount" />
            </x-dashboard.sidebar.link>
        @endhasPermission
        @hasPermission('task.show')
            <x-dashboard.sidebar.link :title="trans('sidebar.tasks')" icon="task" :link="route('tasks.index')" />
        @endhasPermission
        @hasPermission('activity.show')
            <x-dashboard.sidebar.link :title="trans('sidebar.activities')" icon="archive" :link="route('activitylogs')" />
        @endhasPermission

        <!-- Misc -->
        {{-- <li class="menu-item">
            <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Documentation</div>
            </a>
        </li> --}}
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 686px; right: 4px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 528px;"></div>
        </div>
    </ul>
</aside>
