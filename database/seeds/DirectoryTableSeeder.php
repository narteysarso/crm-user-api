<?php

use Illuminate\Database\Seeder;

class DirectoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('directories')->insert([
            ['name' => 'Root', 'parent_directory_id' => 0, 'createable_id' => 0, 'company_id' => 0, 'createable_type' => ""],
            ['name' => 'Staff', 'parent_directory_id' => 1, 'createable_id' => 0, 'company_id' => 0, 'createable_type' => ""],
        ]);
    }
}
