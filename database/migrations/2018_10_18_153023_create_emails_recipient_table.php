<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsRecipientTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('emails_recipient', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('email_id');
            $table->integer('recipientable_id')->unsigned();
            $table->string('recipientable_type');
            $table->string('recipient_type');
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
        Schema::dropIfExists('emails_recipient');
    }
}
