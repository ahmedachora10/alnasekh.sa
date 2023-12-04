<?php

namespace App\Console\Commands;

use App\Models\Permission;
use Illuminate\Console\Command;

class AddPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permissions:store {model} {customPermissions?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $model = strtolower($this->argument('model'));
        $customPermissions = $this->argument('customPermissions') ?? '';

        if(!$model) return $this->error('model not found');

        if($customPermissions && !is_string($customPermissions)) return $this->error('$customPermissions should be of type array');

        $permissions = empty($customPermissions) ? [] : explode(',', $customPermissions);

        foreach ($permissions as $permission) {
            $permission = trim($permission);
            $name = "$model.$permission";

            Permission::firstOrCreate(
                ['name' => $name],
                ['display_name' => $permission]
            );

            $this->info("$name has been added successfuly");
        }


        $this->info('DONE');

    }
}