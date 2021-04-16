<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhilippineBaranggaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('philippine_baranggays', function (Blueprint $table) {
            $table->id();
            $table->string('barangay_code');
            $table->string('name');
            $table->unsignedBigInteger('region_id')->unique();
            $table->foreign('region_id')->nullable()->references('id')->on('philippine_regions');
            $table->unsignedBigInteger('province_id')->unique();
            $table->foreign('province_id')->nullable()->references('id')->on('philippine_provinces');
            $table->unsignedBigInteger('city_id')->unique();
            $table->foreign('city_id')->nullable()->references('id')->on('philippine_cities');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('philippine_baranggays');
    }
}
