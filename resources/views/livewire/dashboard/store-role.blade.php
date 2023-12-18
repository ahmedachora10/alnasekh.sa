<form id="addRoleForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="return false"
    novalidate="novalidate">
    <div class="col-12 mb-4 fv-plugins-icon-container">
        {{-- <label class="form-label" for="modalRoleName">{{ trans('common.role name') }}</label>
        <input type="text" id="modalRoleName" wire:model.defer="name" name="modalRoleName" class="form-control" placeholder="Enter a role name"
            tabindex="-1"> --}}
        <div class="row">
            <div class="col-md-6 col-12">
                <x-dashboard.input-group type="text" wire:model.defer="name" name="name" :title="trans('common.role name')" />
            </div>
            <div class="col-md-6 col-12">
                <x-dashboard.input-group type="text" wire:model.defer="display_name" name="display_name"
                    :title="trans('common.display name')" />
            </div>
        </div>

        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
        </div>
    </div>
    <div class="col-12">
        <h4>{{ trans('common.role permissions') }}</h4>
        <!-- Permission table -->
        <div class="table-responsive">
            <table class="table table-flush-spacing">
                <tbody>
                    <tr>
                        <td class="text-nowrap fw-medium">{{ trans('common.administrator access') }} <i
                                class="bx bx-info-circle bx-xs" data-bs-toggle="tooltip" data-bs-placement="top"
                                aria-label="Allows a full access to the system"
                                data-bs-original-title="Allows a full access to the system"></i></td>
                        <td>
                            <div class="form-check" wire:click="selectAllPermissions">
                                <input class="form-check-input" type="checkbox" id="selectAll"
                                    @checked($this->isCheckedAll($this->permissions->pluck('id')->toArray()))>
                                <label class="form-check-label" for="selectAll">
                                    {{ trans('common.select all') }}
                                </label>
                            </div>
                        </td>
                    </tr>

                    @foreach ($allPermissions as $key => $permission)
                        <tr>
                            <td class="text-nowrap fw-medium">{{ trans('common.' . $key . ' management') }}</td>
                            <td>
                                <div class="d-flex">
                                    @foreach ($permission as $item)
                                        <div class="form-check me-3 me-lg-5"
                                            wire:click="selectPermission({{ $item->id }})">
                                            <input class="form-check-input" type="checkbox" id="{{ $item->name }}"
                                                @checked(in_array($item->id, $selected))>
                                            <label class="form-check-label" for="{{ $item->name }}">
                                                {{ trans('common.' . $item->display_name) }}
                                            </label>
                                        </div>
                                    @endforeach

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Permission table -->
    </div>
    <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary me-sm-3 me-1"
            wire:click="save">{{ trans('common.submit') }}</button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
            aria-label="Close">{{ trans('common.cancel') }}</button>
    </div>
    <input type="hidden">
</form>
