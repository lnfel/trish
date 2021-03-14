<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->nullable()->references('id')->on('services');
            $table->unsignedBigInteger('slot_id');
            $table->foreign('slot_id')->nullable()->references('id')->on('slots');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->nullable()->references('id')->on('users');
            $table->string('status')->nullable()->default('Pending');
            $table->boolean('paid')->nullable()->default(false);
            $table->string('source_id')->nullable(); // used in gcash implementation
            $table->unsignedBigInteger('purpose_id');
            $table->foreign('purpose_id')->nullable()->references('id')->on('purposes');
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
        Schema::dropIfExists('appointments');
    }
}
