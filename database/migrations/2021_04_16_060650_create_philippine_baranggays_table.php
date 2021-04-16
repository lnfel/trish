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
            $table->string('baranggay_code')->index();
            $table->string('name');
            /*$table->unsignedBigInteger('region_code');
            $table->foreign('region_code')->nullable()->references('region_code')->on('philippine_regions');
            $table->unsignedBigInteger('province_code');
            $table->foreign('province_code')->nullable()->references('province_code')->on('philippine_provinces');
            $table->unsignedBigInteger('city_code');
            $table->foreign('city_code')->nullable()->references('city_municipality_code')->on('philippine_cities');*/
            $table->string('region_code')->index();
            $table->string('province_code')->index();
            $table->string('city_municipality_code')->index();
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
