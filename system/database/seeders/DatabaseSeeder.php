<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(MFLSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(ConceptsSeeder::class);
        $this->call(MappingsSeeder::class);
        $this->call(CountySeeder::class);
//        $this->call(ReferralSeeder::class);
        $this->call(TestUserSeeder::class);
        $this->call(ServiceCategorySeeder::class);
        $this->call(ServiceSeeder::class);
    }
}
