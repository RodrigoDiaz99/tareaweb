<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // <!-- Permission list
        Permission::create(['name' => 'index']);
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'show']);
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'destroy']);
    // --> Permissions list
    }
}
