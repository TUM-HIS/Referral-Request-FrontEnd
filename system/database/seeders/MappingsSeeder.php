<?php

namespace Database\Seeders;

use App\Models\Mappings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;

class MappingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to your CSV file
        $csvPath = storage_path('app/public/orgs_moh-kenya_sources_nhdd_mappings.csv');

        // Read the CSV file
        $csv = Reader::createFromPath($csvPath, 'r');

        // Set the header offset if your CSV file has headers
        $csv->setHeaderOffset(0);

        //Insert each record into the Mappings table
        foreach ($csv as $record) {
            Mappings::create([
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
                'custom validation schema' => $record['custom validation schema'],
                'parent_id' => $record['parent_id'],
                'map type' => $record['map type'],
                'sort weight' => $record['sort weight'],
                'external id' => $record['external id'],
                'comment' => $record['comment'],
                'versioned_object_id' => $record['versioned_object_id'],
                'mnemonic' => $record['mnemonic'],
                'from_concept_id' => $record['from_concept_id'],
                'to_concept_id' => $record['to_concept_id'],
                'to_source_id' => $record['to_source_id'],
                'from_source_id' => $record['from_source_id'],
                'from concept code' => $record['from concept code'],
                'from concept name' => $record['from concept name'],
                'from source url' => $record['from source url'],
                'from source version' => $record['from source version'],
                'to concept code' => $record['to concept code'],
                'to concept name' => $record['to concept name'],
                'to source url' => $record['to source url'],
                'to source version' => $record['to source version'],
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
