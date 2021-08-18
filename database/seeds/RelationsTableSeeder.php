<?php

use Illuminate\Database\Seeder;

class RelationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('relations')->insert([
            ['name' => 'spouse'],
            ['name' => 'child'],
            ['name' => 'step child'],
            ['name' => 'foster child'],
            ['name' => 'domestic partner'],
        ]);
    }
}
