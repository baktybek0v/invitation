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
