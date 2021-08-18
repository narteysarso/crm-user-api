<?php

use Illuminate\Database\Seeder;

class MaritalStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('marital_statuses')->insert([
            ['name' => 'single'],
            ['name' => 'divorced'],
            ['name' => 'married'],
            ['name' => ''],
        ]);
    }
}
