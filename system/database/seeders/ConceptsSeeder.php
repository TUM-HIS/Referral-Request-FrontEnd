<?php

namespace Database\Seeders;

use App\Models\Concepts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class ConceptsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to your CSV file
        $csvPath = storage_path('app/public/orgs_moh-kenya_sources_nhdd_concepts.csv');

        // Read the CSV file
        $csv = Reader::createFromPath($csvPath, 'r');

        // Set the header offset if your CSV file has headers
        $csv->setHeaderOffset(0);

        /*foreach ($csv as $row) {
            // Insert the row data into the table
            DB::table('Concepts')->insert($row);
        }*/

        //Insert each record into the Concepts table
        foreach ($csv as $record) {
            Concepts::create([
                'checksums' => $record['checksums'],
                'id' => $record['id'],
                'public access' => $record['public access'],
                'created at' => $record['created at'],
                'updated at' => $record['updated at'],
                'created_by_id' => $record['created_by_id'],
                'updated_by_id' => $record['updated_by_id'],
                'is active' => $this->strToBool($record['is active']),
                'extras' => $record['extras'],
                'uri' => $record['uri'],
                'version' => $record['version'],
                'released' => $this->strToBool($record['released']),
                'retired' => $this->strToBool($record['retired']),
                'is latest version' => $this->strToBool($record['is latest version']),
                'external id' => $record['external id'],
                'concept class' => $record['concept class'],
                'datatype' => $record['datatype'],
                'comment' => $record['comment'],
                'parent_id' => $record['parent_id'],
                'versioned_object_id' => $record['versioned_object_id'],
                'mnemonic' => $record['mnemonic'],
                'counted' => $this->strToBool($record['counted']),
                'index' => $this->strToBool($record['index']),
            ]);
        }

    }

    private function strToBool($value)
    {
        if ($value === 'True') {
            return true;
        } elseif ($value === 'False') {
            return false;
        } 
    }
    
}
