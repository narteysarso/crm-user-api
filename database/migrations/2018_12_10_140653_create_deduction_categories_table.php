<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeductionCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deduction_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('amount', 15, 8);
            $table->integer('currency_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->timestamps();

            $table->foreign('currency_id')->references('id')->on('currency_unit')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies  ')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deduction_categories');
    }
}
