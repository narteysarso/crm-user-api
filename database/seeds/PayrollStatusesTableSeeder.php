<?php

use Illuminate\Database\Seeder;

class PayrollStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('payroll_statuses')->insert([
            ['name' => 'pending'],
            ['name' => 'cancelled'],
            ['name' => 'completed'],
            

        ]);
    }
}
