<div class="card">

    <div @class([
        'd-flex align-items-center',
        'justify-content-end pt-3' => is_null($title),
        'justify-content-between' => !is_null($title),
    ])>
        @if (!is_null($title))
            <h5 class="card-header">{{ $title }}</h5>
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

    <div @class(['text-nowrap', 'table-responsive' => $responsive])>
        <table class="table">
            @if (!empty($columns))
                <thead>
                    <tr>
                        @if ($withId)
                            <th>ID</th>
                        @endif
                        @foreach ($columns as $col)
                            @if (empty($col))
                                <th></th>
                            @else
                                <th> {{ $translate ? trans('table.columns.' . strtolower($col)) : $col }} </th>
                            @endif
                        @endforeach
                        @if ($withActions)
                            <th> {{ trans('table.columns.actions') }} </th>
                        @endif
                    </tr>
                </thead>
            @endif

            <tbody class="table-border-bottom-0">
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div>
