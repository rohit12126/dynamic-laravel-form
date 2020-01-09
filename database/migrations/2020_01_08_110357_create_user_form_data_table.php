<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFormDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_form_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('form_information_id');
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('formfield_id');
            $table->string('field_value',255)->nullable();
            $table->string('ip_address',255)->nullable();
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
        Schema::dropIfExists('user_form_data');
    }
}
