<?php

use Illuminate\Database\Seeder;

class CoverageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('coverage_types')->insert([
            ['name' => 'employee'],
            ['name' => 'family without employee'],
            ['name' => 'employee + spouse'],
            ['name' => 'two party'],
            ['name' => 'employee + children'],
            ['name' => 'employee + child'],
            ['name' => 'employee + family'],
        ]);
    }
}
