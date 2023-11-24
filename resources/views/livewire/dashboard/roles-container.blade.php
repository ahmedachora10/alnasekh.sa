<section>

    <x-dashboard.headline :title="trans('sidebar.roles')" />


    <div class="row g-4">
        @forelse ($roles as $role)
            <div class="col-xl-4 col-lg-6 col-md-6">
                <x-dashboard.cards.role :users="$role->users">
                    <div class="role-heading">
                        <h4 class="mb-1">{{ $role->display_name }}</h4>
                        <a href="#!" wire:click="$dispatch('edit-roles', {role:{{ $role }}})"
                            data-bs-toggle="modal" data-bs-target="#RoleFormModal" class="role-edit-modal"><small> <i
                                    class="bx bx-edit-alt me-1" style="font-size: 16px"></i>
                                {{ trans('common.edit') }}</small></a>
                    </div>
                    {{-- <a href="#!" class="text-muted"><i class="bx bx-trash-alt text-danger"></i></a> --}}
                    <x-dashboard.actions.delete :route="route('roles.destroy', $role)" text="">
                        <i class="bx bx-trash-alt text-danger"></x-dashboard.actions.delete>
                </x-dashboard.cards.role>
            </div>
        @endforeach
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card h-100">
                <div class="row h-100">
                    <div class="col-sm-5">
                        <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                            <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/img/illustrations/sitting-girl-with-laptop-light.png"
                                class="img-fluid" alt="Image" width="120"
                                data-app-light-img="illustrations/sitting-girl-with-laptop-light.png"
                                data-app-dark-img="illustrations/sitting-girl-with-laptop-dark.png">
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body text-sm-end text-center ps-sm-0">
                            <a href="#!" data-bs-target="#RoleFormModal" data-bs-toggle="modal"
                                class="btn btn-primary mb-3 text-nowrap add-new-role">{{ trans('common.new role') }}</a>
                            <p class="mb-0">اضافة دور جديد في حالة غير موجود</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <x-dashboard.modals.modal1 id="RoleFormModal" :title="trans('common.new role')">
            <livewire:dashboard.store-role />
        </x-dashboard.modals.modal1>
    </div>

    {{-- <x-dashboard.tables.table1 :createAction="route('roles.create')" :columns="['name', 'description']">

        @forelse ($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->description ?? '-' }}</td>
                <td>
                    <x-dashboard.actions.container>
                        <x-dashboard.actions.edit
                            :href="route('roles.edit', $role->id)">{{ trans('common.edit') }}</x-dashboard.actions.edit>
                        <x-dashboard.actions.delete :route="route('roles.destroy', $role->id)" />
                    </x-dashboard.actions.container>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="auto">{{ trans('table.empty') }}</td>
            </tr>
        @endforelse
    </x-dashboard.tables.table1> --}}

    {{-- <div class="mt-4" style="margin-right: -40px">
        {{ $roles->links() }}
    </div> --}}

</section>
