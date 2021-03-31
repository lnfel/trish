<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurposeRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purpose_requirement', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purpose_id')->nullable();
            $table->foreign('purpose_id')->nullable()->references('id')->on('purposes');
            $table->unsignedBigInteger('requirement_id')->nullable();
            $table->foreign('requirement_id')->nullable()->references('id')->on('requirements');
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
        Schema::dropIfExists('purpose_requirements');
    }
}
