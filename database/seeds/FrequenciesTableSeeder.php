<?php

use Illuminate\Database\Seeder;

class FrequenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('frequencies')->insert([
            ['name' => 'once'],
            ['name' => 'hourly'],
            ['name' => 'daily'],
            ['name' => 'weekly'],
            ['name' => 'monthly'],
            ['name' => 'yearly'],
            
        ]);
    }
}
