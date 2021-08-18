<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmegencyContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id')->unsigned();
            $table->string('name', 100)->nullable();
            $table->string('relation_id')->unsigned();
            $table->string('workplace', 100)->nullable();
            $table->string('work_phone', 15)->nullable();
            $table->string('home_phone', 15)->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('address', 100)->nullable();
            $table->integer('company_id')->unsigned();
            $table->timestamps();

            $table->foreign('staff_id')->references('id')->on('staffs')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('relation_id')->references('id')->on('relations')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emegency_contacts');
    }
}
