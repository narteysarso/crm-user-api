<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partyoneable_id')->unsigned();
            $table->string('partyoneable_type');
            $table->integer('partytwoable_id')->unsigned();
            $table->string('partytwoable_type');
            $table->boolean('anonymous')->default(0);
            $table->boolean('is_read')->default(0);
            $table->integer('message_id')->unsigned();
            $table->foreign('message_id')->references('message_id')->on('messages')->onDelete('cascade');
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
        Schema::dropIfExists('contacts');
    }
}
