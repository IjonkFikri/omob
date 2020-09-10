<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            // $table->integer('units_id')->unsigned();
            $table->integer('kelas_id')->unsigned();
            $table->timestamps();
            // relations data kelas dan user
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('units_id')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id')->on('levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropForeign('teachers_users_id_foreign');
            $table->dropForeign('teachers_kelas_id_foreign');
        });
        Schema::dropIfExists('teachers');
    }
}
