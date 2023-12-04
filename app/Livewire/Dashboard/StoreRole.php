<?php

namespace App\Livewire\Dashboard;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class StoreRole extends Component
{
    public Role $role;

    public array $selected = [];
    public $permissions;

    public string $name = '';

    public string $display_name = '';

    public function mount() {
        $this->role = new Role();
        $this->permissions = Permission::all();
    }

    public function selectPermission($id) {
        $index = array_search($id, $this->selected);

        if ($index !== false) {
            return array_splice($this->selected, $index, 1);
        }

        array_push($this->selected, $id);
    }

    public function selectAllPermissions() {
        $ids = $this->permissions->pluck('id')->toArray();

        if($this->isCheckedAll($ids) === true) {
            return $this->reset('selected');
        }

        array_push($this->selected, ...$ids);
    }

    public function isCheckedAll($ids) {
        return count($this->selected) > 0 && count($ids) === count($this->selected);
    }

    private function handlePermissions($permissions) {
        $data = [];
        foreach ($permissions as $permission) {
            $model = explode('.', $permission->name)[0];
            $data[$model][] = $permission;
        }

        return $data;
    }

    #[On('edit-roles')]
    public function edit(Role $role) {
        $this->role = $role;
        $this->name = $role->name;
        $this->display_name = $role->display_name;

        $this->selected = $role->permissions()->pluck('id')->toArray();
    }

    public function save() {

        // TODO:: there is some issues should be fixed as soon as possible
        // fix permission issues like select & add

        if($this->role && $this->role?->id === null) {
            $this->store();
            session()->put('success', trans('message.create'));
        } else {
            session()->put('success', trans('message.update'));
            $this->update();
            $this->role = new Role;
        }

        $this->reset('name', 'display_name', 'selected');

        $this->dispatch('refresh-roles');
        $this->dispatch('close-modal');
        $this->dispatch( 'refresh-alert');
    }

    private function store() {
        $this->validate([
            'name' => 'required|string',
            'display_name' => ['required','string']
        ]);

        return DB::transaction(function () {
            $role = Role::create([
                'name' => $this->name,
                'display_name' => $this->name,
            ]);


            if(count($this->selected) > 0) {
                $role->givePermissions($this->selected);
            }

            return $role;
        });
    }

    private function update() {
        $this->validate([
            'name' => ['required','string', ValidationRule::unique('roles', 'name')->ignore($this->role)],
            'display_name' => ['required','string']
        ]);

        return DB::transaction(function () {
            $this->role->update([
                'name' => $this->name,
                'display_name' => $this->display_name,
            ]);

            if(count($this->selected) > 0) {
                $this->role->syncPermissions($this->selected);
            }


            Cache::forget('user-permissions');

            return $this->role;
        });
    }

    public function render()
    {
        return view('livewire.dashboard.store-role', [
            'allPermissions' => $this->handlePermissions($this->permissions)
        ]);
    }
}
