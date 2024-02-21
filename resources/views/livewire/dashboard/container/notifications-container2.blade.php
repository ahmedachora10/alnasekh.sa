<section>

    <x-dashboard.headline :title="trans('common.notifications')" />

    <x-dashboard.cards.sample column="col-12">
        <x-dashboard.tables.table1 :columns="['image', 'title', 'corp', 'created at', 'status']" :withActions="false">

            <x-slot:title>

                <select wire:model.change="filterBy" class="form-control">
                    @foreach ($filters as $value)
                        <option value="{{ $value }}">{{ trans('table.columns.' . $value) }}</option>
                    @endforeach
                </select>

            </x-slot:title>

            @forelse ($notifications as $item)
                @php
                    $title = isset($item->data['title']) ? $item->data['title'] : '-';
                    $content = isset($item->data['content']) ? $item->data['content'] : '-';
                    $color = isset($item->data['color']) ? $item->data['color'] : 'success';
                    $icon = isset($item->data['icon']) ? $item->data['icon'] : 'bx bx-wallet';
                    $link = isset($item->data['link']) ? $item->data['link'] : '#!';
                    $image = isset($item->data['image']) ? $item->data['image'] : '';
                    $owner = isset($item->data['owner']) ? $item->data['owner'] : '';
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
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
                    </td>
                    <td><a href="{{ $link }}" class="text-primary">{{ $title }}</a></td>
                    <td>{{ $content }}</td>
                    <td>{{ $item->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read">
                                <span class="badge badge-dot bg-{{ $color }}"></span>
                            </a>
                            <a href="#!" wire:click="makeItRead({{ $item }})"
                                class="dropdown-notifications-archive"><span
                                    class="bx bx-check-circle text-success"></span></a>
                            <a href="#!" wire:click="delete({{ $item }})" wire:confirm
                                class="dropdown-notifications-archive"><span class="bx bx-trash text-danger"></span></a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>{{ trans('table.empty') }}</td>
                </tr>
            @endforelse
        </x-dashboard.tables.table1>

        <div class="mt-4">
            {{ $notifications->links() }}
        </div>
    </x-dashboard.cards.sample>

</section>
