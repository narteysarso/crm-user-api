<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageRecipientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_recipient', function (Blueprint $table) {
            $table->increments('messagereceived_id');
            $table->integer('messagereceivedable_id')->unsigned();
            $table->string('messagereceivedable_type');
            $table->integer('recipient_group_id')->unsigned()->nullable();
            $table->integer('message_id')->unsigned();
            $table->boolean('is_read')->default(false);
            $table->timestamps();
            $table->foreign('message_id')->references('message_id')->on('messages')->onDelete('cascade');
            $table->foreign('recipient_group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('messagereceivedable_id')->references('id')->on('staffs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_recipient');
    }
}
