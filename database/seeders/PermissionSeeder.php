<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $existingPermissions = Permission::pluck('name')->toArray();
        $permissions = [];
        foreach (config('laratrust.default_permissions', []) as $section => $abilities) {


            foreach ($abilities as $ability) {
                $key = strtolower(trim($section)).'.'.strtolower(trim($ability));

                if (in_array($key, $existingPermissions))
                    continue;

                $permissions[] = [
                    'name' => $key,
                    'display_name' => $ability
                ];
            }

        }

        Permission::insert($permissions);
    }
}
