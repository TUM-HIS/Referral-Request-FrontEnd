<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\ServiceCategory;
use League\Csv\Reader;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to your CSV file
        $csvPath = storage_path('app/public/Service Category List.csv');

        // Read the CSV file
        $csv = Reader::createFromPath($csvPath, 'r');
        $csv->setHeaderOffset(0);

        // Loop through the service categories and insert them into the database
        foreach ($csv as $category) {
            ServiceCategory::create([
                'id' => $category['id'],
                'name' => $category['name'],
                'abbreviation' => $category['abbreviation'],
                'active' => $this->strToNullableBool($category['active']),
                'created' => $category['created'],
                'created_by' => $category['created_by'],
                'deleted' => $this->strToNullableBool($category['deleted']),
                'description' => $category['description'],
                'parent' => $category['parent'],
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
