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
            
            $table->enum("validDoc_document_type", 
            [
                'Временное удостоверение личности',
                'Загранпаспорт других стран',
                'Загранпаспорт РФ',
                'Паспорт инстранного гражданина',
                'Паспорт РФ',
                'Удостоверение личности другой страны'
            ]);
            $table->string("validDoc_serial");
            $table->date("validDoc_date");
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
