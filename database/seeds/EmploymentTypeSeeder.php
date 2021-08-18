<?php

use Illuminate\Database\Seeder;

class EmploymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('employmenttypes')->insert([
            ['name' => 'contract'],
            ['name' => 'seasonal/periodic'],
            ['name' => 'intern'],
            ['name' => 'part-time'],
            ['name' => 'full-time'],

        ]);
    }
}
