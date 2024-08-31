<div class="card overflow-hidden mb-6" style="height: 600px;">
    <h5 class="card-header">
        <span class="col-4">المهام</span>
        {{-- <x-dashboard.input class="col-8" type="search" name='search' wire:model.live="search" /> --}}
    </h5>
    <div class="card-body ps ps--active-y" id="notification-scrolling">
        <ul class="list-group list-group-flush">

            @forelse ($notifications as $notification)
            @php
            $color = isset($notification->data['color']) ? $notification->data['color'] : 'success';
            $icon = isset($notification->data['icon']) ? $notification->data['icon'] : 'bx bx-wallet';
            $link = isset($notification->data['link']) ? $notification->data['link'] : '#!';
            $image = isset($notification->data['image']) ? $notification->data['image'] : '';
            $owner = isset($notification->data['owner']) ? $notification->data['owner'] : '';
            @endphp
            <li @class([ 'list-group-item list-group-item-action dropdown-notifications-item' , 'marked-as-read'=>
                !is_null($notification->read_at),
                ])>
                <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar">
                            @if (!empty($image))
                            <img class="avatar-initial rounded-circle" src="{{ $image }}" />
                            @else
                            <span class="avatar-initial rounded-circle bg-label-{{ $color }}"><i class="{{ $icon }}"></i></span>
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
                        <a href="#!" wire:click="makeItRead({{ $notification }})" class="dropdown-notifications-archive"><span
                                class="bx bx-check-circle text-success"></span></a>
                    </div>
                </div>
            </li>
            @empty
            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                {{ trans('common.no notifications exists') }}</li>
            @endforelse

        </ul>

        <div class="ps__rail-x" style="left: 0px; bottom: -109px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 109px; height: 224px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 19px; height: 40px;"></div>
        </div>
    </div>
</div>

