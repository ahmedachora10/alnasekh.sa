<li class="menu-item">
    <a href="{{ $link }}" class="menu-link @if ($hasSubMenu) menu-toggle @endif">
        @if ($icon)
            <i class="menu-icon tf-icons bx bx-{{ $icon }}"></i>
        @endif
        <div data-i18n="Tables">{{ $title }}</div>
    </a>

    @if ($hasSubMenu)
        <ul class="menu-sub">
            {{ $slot }}
        </ul>
    @endif
</li>
