<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInviteeQrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitee_qrs', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('event_id')->nullable();
			$table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
			$table->string('full_name')->nullable();
			$table->string('organization')->nullable();
			$table->string('job')->nullable();
			$table->string('email', 200)->nullable();
			$table->enum('status', ['pending', 'accept', 'reject'])->default('pending');
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
        Schema::dropIfExists('invitee_qrs');
    }
}
