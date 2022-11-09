<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctorbooks', function (Blueprint $table) {
            $table->id();
            $table->integer('doctor_id');
            $table->string('patient_name');
            $table->string('patient_phone');
            $table->string('patient_address');
            $table->date('book_date');
            $table->string('specialist')->nullable();
            $table->time('book_start_time');
            $table->time('book_end_time');
            $table->dateTime('book_start_date_time');
            $table->dateTime('book_end_date_time');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('doctorbooks');
    }
}
