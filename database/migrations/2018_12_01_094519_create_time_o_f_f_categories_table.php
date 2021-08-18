<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeOFFCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('time_off_categories');
        Schema::create('time_off_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->boolean('paid')->nullable()->default(true);
            $table->integer('track_time_id')->unsigned();
            $table->string('icon_id', 20)->nullable();
            $table->string('iconcolor', 100)->nullable();
            $table->integer('company_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('track_time_id')->references('id')->on('track_time')->onDelete('cascade');
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
        Schema::dropIfExists('time_o_f_f_categories');
    }
}
