<li class="menu-item">
    <a href="{{ $link }}" @class(['menu-link', 'menu-toggle' => $hasSubMenu])>
        @if ($icon)
            <i class="menu-icon tf-icons bx bx-{{ $icon }}"></i>
        @endif
        <div data-i18n="Tables">{{ $title }}</div>
        @if ($notification)
            <span class="badge badge-demo bg-label-warning ms-auto">{{ $notification }} جديد</span>
        @endif
    </a>


    @if ($hasSubMenu)
        <ul class="menu-sub">
            {{ $slot }}
        </ul>
    @endif
</li>
