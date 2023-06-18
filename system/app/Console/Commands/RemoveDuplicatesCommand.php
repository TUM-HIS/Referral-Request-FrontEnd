<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\m_f_l_s;

class RemoveDuplicatesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remove-duplicates-command';

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
        //
        $distinctFacilities = m_f_l_s::select('Code')->distinct()->get();

        m_f_l_s::truncate();

        foreach ($distinctFacilities as $facility) {
            m_f_l_s::create([
                'code' => $facility->code,
                'official_name' => $facility->official_name,
            ]);
        }

        $this->info('Duplicates removed successfully!');
    }
}
