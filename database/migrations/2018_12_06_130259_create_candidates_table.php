<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->string('email', 100)->nullable();
            $table->string('phone', 100);
            $table->string('resumepath', 100)->nullable();
            $table->string('website', 100)->nullable();
            $table->string('referred_by', 100)->nullable();
            $table->longText('comment')->nullable();
            $table->integer('vacancy_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('createable_id')->unsigned();
            $table->string('createable_type');
            $table->timestamps();

            $table->foreign('vacancy_id')->references('id')->on('vacancies')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('candidate_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidates');
    }
}
