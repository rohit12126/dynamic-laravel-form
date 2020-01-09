<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTokenUserFormData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::table('user_form_data', function (Blueprint $table) {
            $table->string('token',255)->after('formfield_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('shop_users', function (Blueprint $table) {
        //     $table->dropColumn(['profile']);
        // });
    }
}
