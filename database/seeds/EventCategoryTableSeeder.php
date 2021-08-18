<?php

use Illuminate\Database\Seeder;

class EventCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('events_category')->insert([
            ['name' => 'berevement'],
            ['name' => 'wedding'],
            ['name' => 'birthday'],
            ['name' => 'anniversary'],
        ]);
    }
}
