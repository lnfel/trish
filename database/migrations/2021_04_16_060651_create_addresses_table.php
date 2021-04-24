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
            /*$table->unsignedBigInteger('brgy_code')->unique();
            $table->foreign('brgy_code')->nullable()->references('baranggay_code')->on('philippine_baranggays');
            $table->unsignedBigInteger('city_code')->unique();
            $table->foreign('city_code')->nullable()->references('city_municipality_code')->on('philippine_cities');
            $table->unsignedBigInteger('province_code')->unique();
            $table->foreign('province_code')->nullable()->references('province_code')->on('philippine_provinces');
            $table->unsignedBigInteger('region_code')->unique();
            $table->foreign('region_code')->nullable()->references('region_code')->on('philippine_regions');*/
            $table->string('baranggay_code')->index();
            $table->string('region_code')->index();
            $table->string('province_code')->index();
            $table->string('city_municipality_code')->index();
            $table->string('zip_code')->nullable();
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->nullable()->references('id')->on('users');
            //$table->unsignedBigInteger('admin_id')->unique();
            //$table->foreign('admin_id')->nullable()->references('id')->on('admins');
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
