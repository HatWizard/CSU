<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('personal_info_ID')->nullable();
            $table->unsignedBigInteger('residence_info_ID')->nullable();
            $table->unsignedBigInteger('docValid_info_ID')->nullable();


            $table->index('personal_info_ID');
            $table->index('residence_info_ID');
            $table->index('docValid_info_ID');
            $table->index('user_id');

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
        Schema::dropIfExists('document_requests');
    }
}
