<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['Doctor', 'Nurse', 'Receptionist', 'Referral Coordinator'];

        foreach ($roles as $role){
            $userRole = new Role;
            $userRole->name = $role;
            $userRole->guard_name = 'user';
            $userRole->save();
        }
    }
}
