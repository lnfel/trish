<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhilippineProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('philippine_provinces', function (Blueprint $table) {
            $table->id();
            $table->string('psgc_code');
            $table->string('name');
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->nullable()->references('id')->on('philippine_regions');
            $table->string('province_code');
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
        Schema::dropIfExists('philippine_provinces');
    }
}
