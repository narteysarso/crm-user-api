<?php

use Illuminate\Database\Seeder;

class CardTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cardtypes')->insert([
            ['name' => 'passport'],
            ['name' => 'student id'],
            ['name' => 'worker id'],
            ['name' => 'national id'],
            ['name' => 'health insurance id'],
            ['name' => 'voters id'],
            ['name' => 'drivers lincense'],
        ]);
    }
}
