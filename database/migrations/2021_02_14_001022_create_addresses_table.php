<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('street_address')->nullable();
            $table->string('brgy')->nullable();
            $table->string('municipality')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('region')->nullable();
            $table->string('zip_code')->nullable();
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->nullable()->references('id')->on('users');
            $table->unsignedBigInteger('admin_id')->unique();
            $table->foreign('admin_id')->nullable()->references('id')->on('admins');
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
        Schema::dropIfExists('addresses');
    }
}
