<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhilippineCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('philippine_cities', function (Blueprint $table) {
            $table->id();
            $table->string('psgc_code');
            $table->string('name');
            $table->unsignedBigInteger('region_id')->unique();
            $table->foreign('region_id')->nullable()->references('id')->on('philippine_regions');
            $table->unsignedBigInteger('province_id')->unique();
            $table->foreign('province_id')->nullable()->references('id')->on('philippine_provinces');
            $table->string('city_municipality_code');
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
        Schema::dropIfExists('philippine_cities');
    }
}
