<li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1" dir="rtl">
    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
        data-bs-auto-close="outside" aria-expanded="false">
        <i class="bx bx-bell bx-sm"></i>
        @if ($unreadNotifications > 0)
            <span class="badge bg-danger rounded-pill badge-notifications">{{ $unreadNotifications }}</span>
        @endif
    </a>
    <ul class="dropdown-menu dropdown-menu-end py-0">
        <li class="dropdown-menu-header border-bottom">
            <div class="dropdown-header d-flex align-items-center py-3">
                <h5 class="text-body mb-0 me-auto">{{ trans('common.notifications') }}</h5>
                {{-- <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip"
                    data-bs-placement="top" aria-label="Mark all as read" data-bs-original-title="Mark all as read"
                    wire:click="makeItAllRead"><i class="bx fs-4 bx-envelope-open"></i></a> --}}
            </div>
        </li>
        <li class="dropdown-notifications-list scrollable-container ps">
            <ul class="list-group list-group-flush">

                @forelse ($notifications as $notification)
                    @php
                        $color = isset($notification->data['color']) ? $notification->data['color'] : 'success';
                        $icon = isset($notification->data['icon']) ? $notification->data['icon'] : 'bx bx-wallet';
                        $link = isset($notification->data['link']) ? $notification->data['link'] : '#!';
                        $image = isset($notification->data['image']) ? $notification->data['image'] : '';
                        $owner = isset($notification->data['owner']) ? $notification->data['owner'] : '';
                    @endphp
                    <li @class([
                        'list-group-item list-group-item-action dropdown-notifications-item',
                        'marked-as-read' => !is_null($notification->read_at),
                    ])>
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar">
                                    @if (!empty($image))
                                        <img class="avatar-initial rounded-circle" src="{{ $image }}" />
                                    @else
                                        <span class="avatar-initial rounded-circle bg-label-{{ $color }}"><i
                                                class="{{ $icon }}"></i></span>
                                    @endif
                                </div>
                            </div>

                            <div class="flex-grow-1">
                                <h6 class="mb-1">
                                    <a href="{{ $link }}">
                                        {!! $notification->data['title'] !!}
                                    </a>
                                </h6>
                                <p class="mb-0">
                                    {{ $notification->data['content'] }}
                                </p>
                                <small class="text-muted">
                                    {{ $owner }}
                                </small>
                            </div>
                            <div class="flex-shrink-0 dropdown-notifications-actions">
                                <a href="javascript:void(0)" class="dropdown-notifications-read">
                                    <span class="badge badge-dot bg-{{ $color }}"></span>

                                </a>
                                <a href="javascript:void(0)" class="dropdown-notifications-read">
                                    <small class="text-muted">
                                        {{ short_date_name($notification->created_at->diffForHumans()) }}
                                    </small>

                                </a>
                                <a href="#!" wire:click="makeItRead({{ $notification }})"
                                    class="dropdown-notifications-archive"><span class="bx bx-check"></span></a>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        {{ trans('common.no notifications exists') }}</li>
                @endforelse

            </ul>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
        </li>
        @if (count($notifications) > 0)
            <li class="dropdown-menu-footer border-top">
                <a href="{{ route('users.notifications') }}"
                    class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40">
                    {{ trans('common.show more') }}
                </a>
            </li>
        @endif
    </ul>
</li>
