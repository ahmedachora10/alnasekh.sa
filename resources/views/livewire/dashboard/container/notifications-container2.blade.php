<section>

    <x-dashboard.headline :title="trans('common.notifications')" />

    <x-dashboard.cards.sample column="col-12">
        <x-dashboard.tables.table1 :columns="['title', 'content', 'created at']">

            @forelse ($notifications as $item)
                @php
                    $title = isset($item->data['title']) ? $item->data['title'] : '-';
                    $content = isset($item->data['content']) ? $item->data['content'] : '-';
                    $color = isset($item->data['color']) ? $item->data['color'] : 'success';
                    $icon = isset($item->data['icon']) ? $item->data['icon'] : 'bx bx-wallet';
                    $link = isset($item->data['link']) ? $item->data['link'] : '#!';
                @endphp
                <tr>
                    <td>
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                                <span class="avatar-initial rounded-circle bg-label-{{ $color }}"><i
                                        class="{{ $icon }}"></i></span>
                            </div>
                        </div>
                    </td>
                    <td>{{ $title }}</td>
                    <td>{{ $content }}</td>
                    <td>{{ $item->created_at->diffForHumans() }}</td>
                    <td>
                        <x-dashboard.actions.container>
                            {{-- <x-dashboard.actions.delete wire:click="destroy({{ $item->id }})" :livewire="true" /> --}}
                        </x-dashboard.actions.container>
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
