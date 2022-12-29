<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInviteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitees', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('event_id')->nullable();
			$table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
			$table->string('number')->nullable();
			$table->string('full_name_en')->nullable();
			$table->string('full_name_ru')->nullable();
			$table->enum('title_en', ['Mr.', 'Ms.'])->nullable()->comment('Инициал обращение, Mister или Miss');
			$table->enum('title_ru', ['Г-н', 'Г-жа'])->nullable()->comment('Инициал обращение, Господин или Госпожа');
			$table->string('organization_en')->nullable();
			$table->string('organization_ru')->nullable();
			$table->string('job_en')->nullable();
			$table->string('job_ru')->nullable();
			$table->string('email', 200);
			$table->string('languages')->comment('Список предпочитаемых языков пользователя [kg,ru,eng]');
			$table->enum('status', ['pending', 'accept', 'reject'])->default('pending');
			$table->string('uniq_code')->comment('Уникальный код для потверждение рассылки');
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
        Schema::dropIfExists('invitees');
    }
}
