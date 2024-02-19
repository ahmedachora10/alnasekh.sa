<section>

    <x-dashboard.headline :title="trans('sidebar.reviews')" />

    <x-dashboard.tables.table1 :columns="['rate', 'comment', 'status']">

        {{-- <x-slot:title>
            <x-dashboard.input type="search" name="search" wire:model.live.debounce.250ms="search"
                placeholder="{{ trans('table.columns.search') }}" />
        </x-slot:title> --}}

        <x-slot:actions>
            <label class=" badge bg-warning mx-3">
                الاجمالي : {{ $reviews->total() }}
            </label>
        </x-slot:actions>

        @forelse ($reviews as $item)
            <tr wire:loading.class="opacity-50">
                <td>{{ $item->id }}</td>

                <td>
                    <div class="rating-container" data-rating="{{ $item->rate }}" id="rateYo-{{ $item->id }}"></div>
                </td>
                <td>{{ $item->comment }}</td>
                <td>
                    <x-dashboard.badge style="cursor: pointer" wire:click="switchStatus({{ $item }})"
                        :color="$item->status ? 'primary' : 'danger'">
                        @if ($item->status)
                            منشور
                        @else
                            مسودة
                        @endif
                    </x-dashboard.badge>
                </td>
                <td>
                    <x-dashboard.actions.container>
                        {{-- <x-dashboard.actions.edit :href="route('reviews.edit', $item->id)">{{ trans('common.edit') }}</x-dashboard.actions.edit> --}}
                        <x-dashboard.actions.delete :route="route('reviews.destroy', $item)" />
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
        {{ $reviews->links() }}
    </div>


    @pushOnce('component-styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    @endPushOnce

    @pushOnce('component-scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    @endPushOnce

    @PushOnce('scripts')
        <script>
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
        </script>
    @endPushOnce

</section>
