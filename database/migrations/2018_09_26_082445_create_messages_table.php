<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('message_id');
            $table->integer('messageable_id')->unsigned();
            $table->string('messageable_type');
            $table->longText('message');
            $table->date('expiry_date')->nullable();
            $table->boolean('is_reminder')->nullable()->default(false);
            $table->integer('reminder_frequency')->unsigned()->nullable();
            $table->date('next_reminder_date')->nullable();
            $table->integer('parent_message_id')->unsigned()->nullable();
            $table->boolean('anonymous')->defualt(0);
            $table->timestamps();

            $table->foreign('messageable_id')->references('id')->on('staffs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
