<?php

namespace Database\Seeders;

use App\Models\MFL;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use League\Csv\Reader;

class MFLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to your CSV file
        $csvPath = storage_path('app/public/mfl_2014-05-12.csv');

        // Read the CSV file
        $csv = Reader::createFromPath($csvPath, 'r');
        $csv->setHeaderOffset(0);

        // Insert each record into the facilities table
        foreach ($csv as $record) {
            MFL::create([
                'Code' => $record['Code'],
                'Officialname' => $record['Officialname'],
                'Province' => $record['Province'],
                'County' => $record['County'],
                'Sub county' => $record['Sub county'],
                'Ward' => $record['Ward'],
                'Facility type' => $record['Facility type'],
                'Owner type' => $record['Owner type'],
                'Constituency' => $record['Constituency'],
                'Open_whole_day' => $this->strToNullableBool($record['Open_whole_day']),
                'Open_weekends' => $this->strToNullableBool($record['Open_weekends']),
                'Operation status' => $record['Operation status'],
                'ANC' => $this->strToNullableBool($record['ANC']),
                'ART' => $this->strToNullableBool($record['ART']),
                'BEOC' => $this->strToNullableBool($record['BEOC']),
                'BLOOD' => $this->strToNullableBool($record['BLOOD']),
                'CAES SEC' => $this->strToNullableBool($record['CAES SEC']),
                'CEOC' => $this->strToNullableBool($record['CEOC']),
                'C-IMCI' => $this->strToNullableBool($record['C-IMCI']),
                'EPI' => $this->strToNullableBool($record['EPI']),
                'FP' => $this->strToNullableBool($record['FP']),
                'GROWM' => $this->strToNullableBool($record['GROWM']),
                'HBC' => $this->strToNullableBool($record['HBC']),
                'HCT' => $this->strToNullableBool($record['HCT']),
                'IPD' => $this->strToNullableBool($record['IPD']),
                'OPD' => $this->strToNullableBool($record['OPD']),
                'OUTREACH' => $this->strToNullableBool($record['OUTREACH']),
                'PMTCT' => $this->strToNullableBool($record['PMTCT']),
                'RAD/XRAY' => $this->strToNullableBool($record['RAD/XRAY']),
                'RHTC/RHDC' => $this->strToNullableBool($record['RHTC/RHDC']),
                'TB DIAG' => $this->strToNullableBool($record['TB DIAG']),
                'TB LABS' => $this->strToNullableBool($record['TB LABS']),
                'TB TREAT' => $this->strToNullableBool($record['TB TREAT']),
                'YOUTH' => $this->strToNullableBool($record['YOUTH']),
            ]);
        }
    }

    private function strToNullableBool($value)
    {
        if ($value === 'Yes' || $value === 'Y') {
            return true;
        } elseif ($value === 'no') {
            return false;
        } else {
            return null;
        }
    }
}
