<?php

use Illuminate\Database\Seeder;

class PayTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('paytypes')->insert([
            ['name' => 'salary(monthly)'],
            ['name' => 'commission'],

        ]);
    }
}
