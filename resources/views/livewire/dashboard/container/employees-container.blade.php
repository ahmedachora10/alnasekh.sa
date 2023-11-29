<section>
    <x-dashboard.wizard.wizard-head current="employees" :branch="!$branch->corp->doesnt_has_branches" />

    <div class="mb-3"></div>

    <x-dashboard.tables.table1 :columns="['employee name', 'resident number', 'start date', 'end date', 'medical insurance', 'health card']">

        <x-slot:actions>
            <div class="mb-3">
                <button class="btn btn-primary me-4 ms-2 btn-sm test-cleave" data-bs-target="#branchEmployeeFormModal"
                    data-bs-toggle="modal">
                    <span class="tf-icons bx bx-plus"></span>
                    <span>{{ trans('common.create') }}</span>
                </button>
            </div>
        </x-slot:actions>

        @forelse ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>

                <td>{{ $employee->name }}</td>

                <td><x-dashboard.badge color="info">{{ $employee->resident_number }}</x-dashboard.badge></td>

                <td>{{ $employee->date('start_date') ?? '-' }}</td>
                <td>{{ $employee->date('end_date') ?? '-' }}</td>

                <td>
                    <x-dashboard.button
                        wire:click="$dispatch('create-update-medical-insurance', { employee: {{ $employee }}})"
                        :class="$employee->medicalInsurance ? 'btn-primary' : 'btn-outline-primary'" :name="trans('table.columns.medical insurance')" :icon="$employee->medicalInsurance ? 'bx bx-check-double' : 'bx bx-checkbox-minus'" />
                </td>

                <td>
                    <x-dashboard.button
                        wire:click="$dispatch('create-update-health-card', { employee: {{ $employee }}})"
                        :class="$employee->healthCardPaper ? 'btn-warning' : 'btn-outline-warning'" :name="trans('table.columns.health card')" :icon="$employee->healthCardPaper ? 'bx bx-check-double' : 'bx bx-checkbox-minus'" />
                </td>

                <td>
                    <x-dashboard.actions.container>
                        <x-dashboard.actions.edit
                            wire:click="$dispatch('edit-employee', {employee : {{ $employee }}})" href="#!">
                            {{ trans('common.edit') }}
                        </x-dashboard.actions.edit>

                        <x-dashboard.actions.delete
                            wire:click="$dispatch('delete-employee', {employee: {{ $employee }}})"
                            :livewire="true" />

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
        {{ $employees->links() }}
    </div>

    @if ($branch->employees()->exists() && $next)
        <div class="mt-3">
            <a href="{{ route('corps.requirements', $branch) }}"
                class="btn btn-primary float-end">{{ trans('common.next') }}</a>
        </div>
    @endif

    <x-dashboard.modals.modal1 id="branchEmployeeFormModal" :title="trans('common.new employee')">
        <livewire:dashboard.branch.store-employee :branch="$branch" />
    </x-dashboard.modals.modal1>

    <x-dashboard.modals.modal1 id="branchEmployeeMedicalInsuranceFormModal" :title="trans('common.new medical insurance')">
        <livewire:dashboard.branch.store-medical-insurance />
    </x-dashboard.modals.modal1>

    <x-dashboard.modals.modal1 id="branchEmployeeHealthCardFormModal" :title="trans('common.new health card')">
        <livewire:dashboard.branch.store-health-card />
    </x-dashboard.modals.modal1>
</section>
