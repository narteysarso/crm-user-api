<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idcards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number')->nullable();
            $table->string('url',255)->nullable();
            $table->integer('type_id')->unsigned();
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('cardtypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('idcards');
    }
}
