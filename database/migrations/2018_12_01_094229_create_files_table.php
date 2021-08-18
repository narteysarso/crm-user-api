<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('filepath');
            $table->integer('directory_id')->unsigned()->nullable()->default(1);
            $table->integer('company_id')->unsigned();
            $table->integer('createable_id')->unsigned();
            $table->string('createable_type');
            $table->boolean('private')->default(false);
            $table->timestamps();

            $table->foreign('directory_id')->references('id')->on('directories')->onDelete('cascade');
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
        Schema::dropIfExists('files');
    }
}
