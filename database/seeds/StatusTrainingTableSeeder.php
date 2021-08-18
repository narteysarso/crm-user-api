<?php

use Illuminate\Database\Seeder;

class StatusTrainingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('status_training')->insert([
            ['name' => 'pending'],
            ['name' => 'halted'],
            ['name' => 'stopped'],
            ['name' => 'incomplete'],
            ['name' => 'complete'],
        ]);
    }
}
