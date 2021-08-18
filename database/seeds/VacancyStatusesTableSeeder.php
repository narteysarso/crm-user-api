<?php

use Illuminate\Database\Seeder;

class VacancyStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('vacancy_statuses')->insert([
            ['name' => 'open'],
            ['name' => 'draft'],
            ['name' => 'on hold'],
            ['name' => 'filled'],
            ['name' => 'cancelled'],
        ]);
    }
}
