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
    protected $signature = 'permissions:store {model} {customePermissions?}';

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
        $customePermissions = $this->argument('customePermissions') ?? '';

        if(!$model) return $this->error('model not found');

        if($customePermissions && !is_string($customePermissions)) return $this->error('$customePermissions should be of type array');

        $customePermissions = empty($customePermissions) ? [] : explode(',', $customePermissions);

        $permissions = array_merge([
            'create', 'edit', 'delete', 'show'
        ], $customePermissions);

        foreach ($permissions as $permission) {
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