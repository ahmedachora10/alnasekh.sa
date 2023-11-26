<section>
    @if ($targetStep)
        <x-dashboard.wizard.wizard-head current="branches" />
    @else
        <x-dashboard.headline :title="trans('sidebar.branches')" description="عرض جميع فروع المنشأة {{ $corp->name }}" />
    @endif

    <div class="mb-3"></div>

    <x-dashboard.tables.table1 :columns="['name', 'registration number', 'address']">

        <x-slot:actions>
            <div class="mb-3">
                <button class="btn btn-primary me-4 ms-2 btn-sm test-cleave" data-bs-target="#branchFormModal"
                    data-bs-toggle="modal">
                    <span class="tf-icons bx bx-plus"></span>
                    <span>{{ trans('common.create') }}</span>
                </button>
            </div>
        </x-slot:actions>

        @forelse ($branches as $branch)
            <tr>
                <td>{{ $branch->id }}</td>

                <td>{{ $branch->name }}</td>

                <td><x-dashboard.badge color="info">{{ $branch->registration_number }}</x-dashboard.badge></td>

                <td>{{ $branch->address ?? '-' }}</td>

                <td>
                    <x-dashboard.actions.container>
                        <a href="{{ route('users.show', $branch->id) }}" class="dropdown-item"> <i
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
    </x-dashboard.tables.table1>

    <div class="mt-4">
        {{ $branches->links() }}
    </div>

    <x-dashboard.modals.modal1 id="branchFormModal" :title="trans('common.new branch')">
        <livewire:dashboard.branch.store-branch :corp="$corp" />
    </x-dashboard.modals.modal1>

</section>
