<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Payrolls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('payrolls', function(Blueprint $table){
            $table->increments('id');
            // $table->integer('position_id')->unsigned();
            // $table->decimal('base_rate');
            // $table->string('location')->nullable();
            $table->string('name');
            $table->integer('company_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('status_id')->references('id')->on('payroll_statuses');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('payrolls');
    }
}
