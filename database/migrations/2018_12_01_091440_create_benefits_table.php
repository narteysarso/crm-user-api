<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText("description")->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('coverage_id')->unsigned();
            $table->double('plan_cost');
            $table->integer('company_id')->unsigned();
            $table->integer('currency_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('coverage_id')->references('id')->on('coverage_types')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('currency_id')->references('id')->on('currency_unit')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('benefits');
    }
}
