<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidenceInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residence_infos', function (Blueprint $table) {
            $table->id();

            $table->string('residence_index');
            $table->string('residence_region');
            $table->string('residence_district');
            $table->string('residence_city');
            $table->string('residence_street');
            $table->string('residence_homeNumber');
            $table->string('residence_apartmentNumber');
            $table->string('citizenship');

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
        Schema::dropIfExists('residence_infos');
    }
}
