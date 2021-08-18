<?php

use Illuminate\Database\Seeder;

class ProjectStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('project_status')->insert([
            ['name' => 'pending'],
            ['name' => 'cancelled'],
            ['name' => 'complete'],
            ['name' => 'partial'],
            ['name' => 'halted'],
            ['name' => 'not started'],
            ['name' => 'in progress'],
        ]);
    }
}
