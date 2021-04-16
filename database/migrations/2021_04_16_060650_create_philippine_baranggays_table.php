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
            $table->string('region_code');
            $table->string('province_code');
            $table->string('city_municipality_code');
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
        Schema::dropIfExists('philippine_baranggays');
    }
}
