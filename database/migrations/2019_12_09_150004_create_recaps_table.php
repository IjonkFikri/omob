<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recaps', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('units_id')->unsigned();
            $table->timestamps();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('units_id')->references('id')->on('units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reacaps', function (Blueprint $table) {
            $table->dropForeign('recaps_users_id_foreign');
            $table->dropForeign('racaps_units_id_foreign');
        });
        Schema::dropIfExists('recaps');
    }
}
