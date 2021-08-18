<?php

use Illuminate\Database\Seeder;

class TimeOffStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('time_off_status')->insert([
            ['name' => 'pending'],
            ['name' => 'approved'],
            ['name' => 'denied'],
            ['name' => 'cancelled'],
        ]);
    }
}
