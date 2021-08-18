<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSharedDirectoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shared_directory', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('directory_id')->unsigned();
            $table->integer('userable_id')->unsigned();
            $table->string('userable_type');
            $table->timestamps();

            $table->foreign('directory_id')->references('id')->on('directories')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shared_directory');
    }
}
