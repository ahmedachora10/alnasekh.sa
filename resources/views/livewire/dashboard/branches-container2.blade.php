<section>

    <div class="row justify-content-end align-items-center mb-3">
        <x-dashboard.input type="search" name="search" wire:model.live.debounce.250ms="search"
            placeholder="{{ trans('table.columns.search') }}" style="width: 320px" />
    </div>

    <x-dashboard.tables.table2 :columns="['name', 'registration number', 'address', 'steps']">

        @forelse ($branches as $branch)
            <tr wire:loading.class="opacity-50">
                <td>
                    {{ $branch->id }}
                </td>

                <td>{{ $branch->name }}</td>

                <td><x-dashboard.badge color="info">{{ $branch->registration_number }}</x-dashboard.badge></td>

                <td>{{ $branch->address ?? '-' }}</td>
                <td>
                    @php
                        $steps = stepsChecker($corp->branch);
                    @endphp
                    <a class="btn btn-sm btn-outline-{{ $steps['link'] === '#' ? 'secondary disabled' : 'danger' }}"
                        target="_blank" href="{{ $steps['link'] }}">{{ $steps['text'] }}</a>
                </td>

                <td>
                    <x-dashboard.actions.container>
                        <a href="{{ route('branches.show', $branch) }}" class="dropdown-item"> <i
                                class="bx bx-show me-1"></i>
                            عرض</a>
                        <x-dashboard.actions.edit wire:click="$dispatch('edit-branch', {branch: {{ $branch }}})"
                            href="#!" data-bs-target="#branchFormModal" data-bs-toggle="modal">
                            {{ trans('common.edit') }}
                        </x-dashboard.actions.edit>
                        <x-dashboard.actions.delete
                            wire:click="$dispatch('delete-branch', {branch: {{ $branch }}})" :livewire="true" />

                    </x-dashboard.actions.container>
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ trans('table.empty') }}</td>
            </tr>
        @endforelse
    </x-dashboard.tables.table2>

    <div>
        {{ $branches->links() }}
    </div>

    <x-dashboard.modals.modal1 id="branchFormModal" :title="trans('common.new branch')">
        <livewire:dashboard.branch.store-branch :corp="$corp" />
    </x-dashboard.modals.modal1>

</section>
