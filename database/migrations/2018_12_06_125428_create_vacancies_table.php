<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('role_id')->unsigned();
            $table->integer('hiring_lead')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->integer('employment_type_id')->unsigned();
            $table->integer('min_experience_id')->unsigned();
            $table->integer('branch_id')->unsigned();
            $table->longText('description')->nullable();
            $table->string('postal', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('province', 100)->nullable();
            $table->integer('company_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('createable_id')->unsigned();
            $table->string('createable_type');

            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('hiring_lead')->references('id')->on('staffs')->onDelete('cascade');
            $table->foreign('employment_type_id')->references('id')->on('employmenttypes')->onDelete('cascade');
            $table->foreign('min_experience_id')->references('id')->on('experiences')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('vacancy_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancies');
    }
}
