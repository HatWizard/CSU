<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_id');

            $table->enum('univercity_subdivision', ['Челябинск', 'Миас', 'Троицк']);
            $table->enum('future_education_level', ['Колледж', 'Бакалавриат/Специалитет', 'Аспирантура']);
            $table->string("surname");
            $table->string("name");
            $table->string("patronymic")->nullable();
            $table->enum("gender", ['Мужчина','Женщина']);
            $table->date('birthdate');
            $table->string('birthplace');
            $table->string('response_email');
            $table->string('phone_number');


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
        Schema::dropIfExists('personal_infos');
    }
}
