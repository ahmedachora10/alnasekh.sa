<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                {{-- <x-dashboard.logo width="25" /> --}}
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">{{ setting('app_name') }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 ps ps--active-y">

        @hasPermission('dashboard.show')
            <x-dashboard.sidebar.link :title="trans('sidebar.home')" icon="home-circle" :link="route('dashboard')" />
        @endhasPermission

        @hasPermission('corp.show|setting.show|monthly-quarterly.show|registry.show')
            <x-dashboard.sidebar.link :title="trans('sidebar.corps')" icon="folder" link="#" :hasSubMenu="true">
                @hasPermission('corp.show')
                    <x-dashboard.sidebar.link :title="trans('sidebar.corps')" :link="route('corps.index')" />
                @endhasPermission
                @hasPermission('monthly-quarterly.show')
                    <x-dashboard.sidebar.link :title="trans('sidebar.monthly quarterly updates')" :link="route('monthly-quarterly-update.index')" />
                @endhasPermission
                @hasPermission('registry.show')
                    <x-dashboard.sidebar.link :title="trans('sidebar.registries')" :link="route('registries.index')" />
                @endhasPermission

            </x-dashboard.sidebar.link>
        @endhasPermission

        @hasPermission('user.show|setting.show')
            <x-dashboard.sidebar.link-head>
                <span>{{ trans('sidebar.users') }} / {{ trans('sidebar.roles') }}</span>
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
            </x-dashboard.sidebar.link>
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
