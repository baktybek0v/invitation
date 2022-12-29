<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
			$table->string('mailer')->nullable();           
			$table->string('host')->nullable();   
			$table->string('port')->nullable();
			$table->string('email')->unique();
			$table->string('password')->nullable();
			$table->string('encryption')->nullable();
			$table->string('from_address')->nullable();
			$table->string('from_name')->nullable();
			$table->timestamps();
        });
		/*
		MAIL_MAILER=smtp
		MAIL_HOST=smtp.gmail.com
		MAIL_PORT=465
		MAIL_USERNAME=baktybekova.ernis@mail.ru
		MAIL_PASSWORD=PhsisD1e78qd7ynss5st
		MAIL_ENCRYPTION=ssl
		MAIL_FROM_ADDRESS=baktybekova.ernis@mail.ru
		MAIL_FROM_NAME="${APP_NAME}"
		*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emails');
    }
}
