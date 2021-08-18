<?php

use Illuminate\Database\Seeder;

class CurrencyUnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('currency_unit')->insert([
            ['name' => 'GH'],
            ['name' => 'USD'],
            ['name' => 'GBP'],
            ['name' => 'EUR'],
        ]);
    }
}
