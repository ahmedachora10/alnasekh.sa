<section>

    <x-dashboard.headline :title="trans('sidebar.service requests')" />

    <x-dashboard.tables.table1
        :columns="['service', 'company name', 'administrator name', 'email', 'phone', 'city', 'type']">

        <x-slot:title>
            <x-dashboard.input type="search" name="search" wire:model.live.debounce.250ms="search"
                placeholder="{{ trans('table.columns.search') }}" />
        </x-slot:title>

        <x-slot:actions>
            <label class=" badge bg-warning mx-3">
                الاجمالي : {{ $requests->total() }}
            </label>
        </x-slot:actions>

        @forelse ($requests as $item)
        <tr wire:loading.class="opacity-50" @class(['table-primary'=> $item->service?->yearly_price == 0])>
            <td>{{ $item->id }}</td>
            <td>{{ $item?->service?->get_name }}</td>
            <td>{{ $item->company_name }}</td>
            <td>{{ $item->administrator_name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->company_city }}</td>
            <td>{{ $item->company_type }}</td>

            <td>
                <x-dashboard.actions.container>
                    <a href="#" wire:click="details({{ $item }})" class="dropdown-item"> <i class="bx bx-show me-1"></i>
                        {{ trans('common.show') }} </a>
                    <x-dashboard.actions.delete wire:click="delete({{ $item }})" :livewire="true" />
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
        {{ $requests->links() }}
    </div>

    <x-dashboard.modals.modal1 id="details">
        <div class="col-12 row">

            <h6 class="mb-4 text-secondary">{{ trans('table.columns.informations') }}</h6>

            <div class="row justify-content-between align-items-start">
                <div class="col-sm-5 col-12">
                    <p class="text-nowrap"><span>{{ trans('table.columns.service') }} : </span>
                        {{ $request?->service?->get_name }}</p>

                    <p class="text-nowrap"><span>{{ trans('table.columns.company name') }} : </span>
                        {{ $request?->company_name }}</p>

                    <p class="text-nowrap"><span>{{ trans('table.columns.administrator name') }} : </span>
                        {{ $request?->administrator_name }}</p>

                    <p class="text-nowrap"><span>{{ trans('table.columns.commercial registration number') }} : </span>
                        {{ $request?->commercial_registration_number }}</p>

                    <p class="text-nowrap"><span>{{ trans('table.columns.company activity') }} : </span>
                        {{ $request?->company_activity }}</p>

                    <p class="text-nowrap"><span>{{ trans('table.columns.total employees') }} : </span>
                        {{ $request?->total_employees }}</p>

                    <p class="text-nowrap"><span>{{ trans('table.columns.company headquarters') }} : </span>
                        {{ $request?->company_headquarters }}</p>

                    <p class="text-nowrap"><span>{{ trans('table.columns.company type') }} : </span>
                        {{ $request?->company_type }}</p>

                </div>
                <div class="col-sm-5 col-12">
                    <p class="text-nowrap"><span>{{ trans('table.columns.phone') }} : </span>
                        {{ $request?->phone }}</p>

                    <p class="text-nowrap"><span>{{ trans('table.columns.email') }} : </span>
                        {{ $request?->email }}</p>

                    <p class="text-nowrap"><span>{{ trans('table.columns.company size') }} : </span>
                        {{ $request?->company_size }}</p>

                    <p class="text-nowrap"><span>{{ trans('table.columns.number of resident employees') }} : </span>
                        {{ $request?->number_of_resident_employees }}</p>

                    <p class="text-nowrap"><span>{{ trans('table.columns.number of saudi employees') }} : </span>
                        {{ $request?->number_of_saudi_employees }}</p>

                    <p class="text-nowrap"><span>{{ trans('table.columns.company city') }} : </span>
                        {{ $request?->company_city }}</p>

                    <p class="text-nowrap"><span>{{ trans('table.columns.number of branches') }} : </span>
                        {{ $request?->number_of_branches }}</p>
                </div>
            </div>
        </div>
    </x-dashboard.modals.modal1>


</section>
</section>
