<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use League\Csv\Reader;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to your CSV file
        $csvPath = storage_path('app/public/Service List.csv');

        // Read the CSV file
        $csv = Reader::createFromPath($csvPath, 'r');
        $csv->setHeaderOffset(0);

        // Loop through the service categories and insert them into the database
        foreach ($csv as $category) {
            Service::create([
                'id' => $category['id'],
                'name' => $category['name'],
                'abbreviation' => $category['abbreviation'],
                'active' => $this->strToNullableBool($category['active']),
                'category' => $category['category'],
                'category_name' => $category['category_name'],
                'code' => $category['code'],
                'created' => $category['created'],
                'created_by' => $category['created_by'],
                'deleted' => $this->strToNullableBool($category['deleted']),
                'description' => $category['description'],
                'group' => $category['group'],
                'has_options' => $this->strToNullableBool($category['has_options']),
                'keph_level' => $category['keph_level'],
                'search' => $category['search'],
                'updated' => $category['updated'],
                'updated_by' => $category['updated_by'],
            ]);
        }
    }

    private function strToNullableBool($value)
    {
        if ($value === 'TRUE') {
            return true;
        } elseif ($value === 'FALSE') {
            return false;
        } else {
            return null;
        }
    }
}
