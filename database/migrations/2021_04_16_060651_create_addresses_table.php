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
            $table->unsignedBigInteger('brgy_id')->unique();
            $table->foreign('brgy_id')->nullable()->references('id')->on('philippine_baranggays');
            $table->unsignedBigInteger('city_id')->unique();
            $table->foreign('city_id')->nullable()->references('id')->on('philippine_cities');
            $table->unsignedBigInteger('province_id')->unique();
            $table->foreign('province_id')->nullable()->references('id')->on('philippine_provinces');
            $table->unsignedBigInteger('region_id')->unique();
            $table->foreign('region_id')->nullable()->references('id')->on('philippine_regions');
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
