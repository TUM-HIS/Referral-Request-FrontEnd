<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {

        $roleNames = include(database_path('utils/role_names.php'));

        foreach ($roleNames as $roleName) {
            Role::create(['name' => $roleName, 'guard_name' => 'web']);
        }

    }
}
