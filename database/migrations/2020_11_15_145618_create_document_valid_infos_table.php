<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentValidInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_valid_infos', function (Blueprint $table) {
            $table->id();
            
            $table->string("validDoc_document_type");
            $table->string("validDoc_serial");
            $table->string("validDoc_number");
            $table->string("validDoc_subdivision_code");
            $table->string("validDoc_photosPath");

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
        Schema::dropIfExists('document_valid_infos');
    }
}
