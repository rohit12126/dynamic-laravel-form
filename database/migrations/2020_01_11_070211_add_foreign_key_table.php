<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formfields', function (Blueprint $table) {

            $table ->foreign('form_information_id')
              ->references('id')->on('form_information')
              ->onDelete('cascade')->change();
            $table->foreign('input_type_id')
              ->references('id')->on('input_types')
              ->onDelete('cascade')->change();  
        });

        Schema::table('user_form_data', function (Blueprint $table) {
  

            $table->foreign('form_information_id')
              ->references('id')->on('form_information')
              ->onDelete('cascade')->change();
            $table->foreign('formfield_id')
              ->references('id')->on('formfields')
              ->onDelete('cascade')->change(); 
            $table ->foreign('user_id')
              ->references('id')->on('users')
              ->onDelete('cascade')->change();   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formfields', function (Blueprint $table) {
            $table->dropForeign('form_information_id');
            $table->dropForeign('input_type_id');
        });
        Schema::table('user_form_data', function (Blueprint $table) {
            $table->dropForeign('form_information_id');
            $table->dropForeign('formfield_id');
            $table->dropForeign('user_id');
        });
    }
}
