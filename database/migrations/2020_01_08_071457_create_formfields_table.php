<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormfieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formfields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('form_information_id');
            $table->bigInteger('input_type_id');
            $table->string('name',255);
            $table->string('label',255);
            $table->string('value',255)->nullable();
          
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
        Schema::dropIfExists('formfields');
    }
}
