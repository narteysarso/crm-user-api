<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('postal')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('mobile',15)->nullable();
            $table->string('ice',15)->nullable();
            $table->string('home_phone',15)->nullable();
            $table->string('employeeid')->nullable();
            $table->date('start_date')->nullable();
            $table->string('file')->nullable();
            $table->integer('nationality_id')->unsigned()->nullable();
            $table->string('residence')->nullable();
            $table->string('profileurl',255)->nullable()->default('defaultprofile.jpg');
            $table->char('gender',1)->nullable();
            $table->integer('approver')->nullable();
            $table->date('dob')->nullable();
            $table->integer('role_id')->unsigned()->nullable();
            $table->integer('card_id')->unsigned()->nullable();
            $table->integer('status_id')->unsigned()->nullable();

            $table->foreign('nationality_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->foreign('card_id')->references('id')->on('idcards')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
