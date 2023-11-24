<div class="card">

    <div @class([
        'd-flex align-items-center',
        'justify-content-end pt-3' => is_null($title),
        'justify-content-between' => !is_null($title),
    ])>
        @if (!is_null($title))
            <h5 class="card-header">{{ trans($title) }}</h5>
        @endif

        {{-- Go to create page --}}
        @if (!is_null($createAction))
            <a href="{{ $createAction }}" class="btn btn-primary mx-4 btn-sm ">
                <span class="tf-icons bx bx-plus"></span>
                <span>{{ trans('common.create') }}</span>
            </a>
        @endif

        @if (!is_null($actions))
            {{ $actions }}
        @endif
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table">
            @if (!empty($columns))
                <thead>
                    <tr>
                        <th>ID</th>
                        @foreach ($columns as $col)
                            <th> {{ trans('table.columns.' . strtolower($col)) }} </th>
                        @endforeach
                        <th> {{ trans('table.columns.actions') }} </th>
                    </tr>
                </thead>
            @endif

            <tbody class="table-border-bottom-0">
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div>
