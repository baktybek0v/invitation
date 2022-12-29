<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
			$table->string('title_en')->nullable();
			$table->string('title_ru')->nullable();
			$table->string('title_ky')->nullable();
			$table->longText('description_en')->nullable();
			$table->longText('description_ru')->nullable();
			$table->longText('description_ky')->nullable();
			$table->longText('accept_answer_en')->nullable()->comment('[en] текст который будет показываться если пользователь принял приглашения');
			$table->longText('accept_answer_ru')->nullable()->comment('[ru] текст который будет показываться если пользователь принял приглашения');
			$table->longText('accept_answer_ky')->nullable()->comment('[kg] текст который будет показываться если пользователь принял приглашения');
			$table->longText('reject_answer_en')->nullable()->comment('[en] текст который будет показываться если пользователь отверг приглашения');
			$table->longText('reject_answer_ru')->nullable()->comment('[ru] текст который будет показываться если пользователь отверг приглашения');
			$table->longText('reject_answer_ky')->nullable()->comment('[kg] текст который будет показываться если пользователь отверг приглашения');
			$table->string('file_invitees')->nullable();
			$table->string('start_date')->nullable()->comment('Y-m-d');
			$table->string('start_time')->nullable()->comment('H:i');
			$table->text('qr_en')->nullable()->comment('[en] текст сгенерируемого QR кода');
			$table->text('qr_ru')->nullable()->comment('[ru] текст сгенерируемого QR кода');
			$table->text('qr_ky')->nullable()->comment('[kg] текст сгенерируемого QR кода');
			$table->enum('status', ['created', 'sended', 'resended'])->default('created');
			$table->unsignedInteger('resended_amount')->default(0)->comment('счётчик количество переотправлений');
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
        Schema::dropIfExists('events');
    }
}
