<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permissions')->insert([
            ['name' => 'super user'],
            ['name' => 'basic'],
            ['name' =>  'add staff'],
            ['name' =>  'edit staff'],
            ['name' =>  'delete staff'],
            ['name' =>  'manage permissions'],
            ['name' =>  'view staff'],
            ['name' =>  'add assert'],
            ['name' =>  'view assert'],
            ['name' =>  'edit assert'],
            ['name' =>  'delete assert'],
            ['name' =>  'add group'],
            ['name' =>  'edit group'],
            ['name' =>  'delete group'],
            ['name' =>  'view group'],
            ['name' => 'add ticket'],
            ['name' => 'edit ticket'],
            ['name' => 'delete ticket'],
            ['name' => 'view ticket'],
            ['name' => 'manage benefits'],
            ['name' => 'manage assets'],
            ['name' => 'manage training'],
            
        ]);
    }
}
