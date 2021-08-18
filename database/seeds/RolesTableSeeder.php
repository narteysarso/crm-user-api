<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            ['name' => 'accountant'],
            ['name' => 'administrator'],
            ['name' => 'assistant'],
            ['name' => 'bookkeeper'],
            ['name' => 'controller'],
            ['name' => 'chief executive officer'],
            ['name' => 'chief information officer'],
            ['name' => 'chief financial officer'],
            ['name' => 'chief operating officer'],
            ['name' => 'cleaner'],
            ['name' => 'clerk'],
            ['name' => 'data entry'],
            ['name' => 'driver'],
            ['name' => 'employee'],
            ['name' => 'engineer'],
            ['name' => 'general manager'],
            ['name' => 'internship'],
            ['name' => 'manager'],
            ['name' => 'marketing manager'],
            ['name' => 'mechanic'],
            ['name' => 'office manager'],
            ['name' => 'operations manager'],
            ['name' => 'president'],
            ['name' => 'production managaer'],
            ['name' => 'programmer'],
            ['name' => 'project manager'],
            ['name' => 'public relations officer'],
            ['name' => 'purchasing manager'],
            ['name' => 'receptionist'],
            ['name' => 'sales manager'],
            ['name' => 'safety officer'],
            ['name' => 'secretary'],
            ['name' => 'specialist'],
            ['name' => 'staff'],
            ['name' => 'student'],
            ['name' => 'supervisor'],
            ['name' => 'technician'],
            ['name' => 'vendor'],
            ['name' => 'vice president'],
            
        ]);

    }
}
