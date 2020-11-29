<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_id');

            $table->enum('education_level', 
            [
                'Высшее', 
                'Основное', 
                'Среднее общее', 
                'Среднее специальное'   
            ]
            );
            $table->enum('education_document_type', 
                [
                'Аттестат', 
                'Диплом бакалавра',
                'Диплом дипломированного специалиста',
                'Диплом магистра',
                'Диплом о начальном профессиональном образовании',
                'Диплом о среднем профессиональном образовании',
                'Диплом специалиста'
                ]
            );
            $table->string('education_document_serial');
            $table->string('education_document_number');
            $table->date('education_date');
            $table->string('education_region');
            $table->string('education_institution_name');
            $table->string('education_document_photos_names');
            $table->enum('education_language',
            [
                'Английский',
                'Итальянский',
                'Немецкий',
                'Русский',
                'Французкий'
            ]);
            


            $table->index('request_id');
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
        Schema::dropIfExists('education_infos');
    }
}
