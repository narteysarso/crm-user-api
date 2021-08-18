<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeoffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeoffs', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('staff_id')->unsigned();
            $table->integer('timeoff_category_id')->unsigned();
            $table->integer('status_id')->unsigned()->default(1);
            $table->integer('company_id')->unsigned();
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('time_off_status')->onDelete('cascade');
            $table->foreign('staff_id')->references('id')->on('staff_id')->onDelete('cascade');
            $table->foreign('timeoff_category_id')->references('id')->on('time_off_categories')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timeoffs');
    }
}
