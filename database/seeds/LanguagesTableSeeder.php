<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coverage_types')->insert([
            ['name' => 'Arabic'],
            ['name' => 'Bengali'],
            ['name' => 'Chinese'],
            ['name' => 'English'],
            ['name' => 'French'],
            ['name' => 'Hindi'],
            ['name' => 'Japanese'],
            ['name' => 'Lahnda'],
            ['name' => 'Portugese'],
            ['name' => 'Russian'],
            ['name' => 'Spanish'],
            
        ]);
    }
}
