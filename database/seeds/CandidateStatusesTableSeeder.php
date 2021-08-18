<?php

use Illuminate\Database\Seeder;

class CandidateStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('candidate_statuses')->insert([
            ['name' => 'declined offer'],
            ['name' => 'hire'],
            ['name' => 'hired elsewhere'],
            ['name' => 'interview'],
            ['name' => 'interviewed'],
            ['name' => 'not qualified'],
            ['name' => 'not a fit'],
            ['name' => 'offer sent'],
            ['name' => 'put on hold'],
            ['name' => 'reviewed'],
            ['name' => 'schedule'],
        ]);
    }
}
