<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUserIdAndAddresIdToNull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {           
            $table->integer('user_id')->nullable()->change();
            $table->integer('address_id')->nullable()->change();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('null', function (Blueprint $table) {
            $table->integer('user_id')->change();
            $table->integer('address_id')->change();
        });
    }
}
