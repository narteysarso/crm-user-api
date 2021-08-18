<?php

use Illuminate\Database\Seeder;

class ExperiencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('experiences')->insert([
            ['name' => 'entry-level'],
            ['name' => 'mid-level'],
            ['name' => 'experienced'],
            ['name' => 'manager/supervisor'],
            ['name' => 'executive'],
            ['name' => 'senior executive'],
        ]);
    }
}
