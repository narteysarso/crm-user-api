<?php

use Illuminate\Database\Seeder;

class TrackTimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('track_time')->insert([
            ['name' => 'hours'],
            ['name' => 'days'],
            ['name' => 'weeks'],
            ['name' => 'month']
        ]);
    }
}
