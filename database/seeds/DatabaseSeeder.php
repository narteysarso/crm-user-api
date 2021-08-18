<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('CandidateStatusesTableSeeder');
        $this->call('CardTypesTableSeeder');
        $this->call('CoverageTableSeeder');
        $this->call('CurrencyUnitTableSeeder');
        $this->call('DirectoryTableSeeder');
        $this->call('EmploymentTypeSeeder');
        $this->call('EventCategoryTableSeeder');
        $this->call('ExperiencesTableSeeder');
        $this->call('FrequenciesTableSeeder');
        $this->call('LanguagesTableSeeder');
        $this->call('MaritalStatusTableSeeder');
        $this->call('NationalitiesTableSeeder');
        $this->call('PayrollStatusesTableSeeder');
        $this->call('PayTypeSeeder');
        $this->call('PermissionsTableSeeder');
        $this->call('ProjectStatusTableSeeder');
        $this->call('RelationsTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('StatusesTableSeeder');
        $this->call('StatusTrainingTableSeeder');
        $this->call('TimeOffStatusTableSeeder');
        $this->call('TrackTimeTableSeeder');
        $this->call('VacancyStatusesTableSeeder');
    }

}
