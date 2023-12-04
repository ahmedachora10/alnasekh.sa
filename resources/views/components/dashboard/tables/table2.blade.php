<div class="card">
    <div class="table-responsive text-nowrap">
        <table class="table text-nowrap">
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
