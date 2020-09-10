<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('kelas_id')->unsigned();
            // $table->integer('units_id')->unsigned();
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
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('students_users_id_foreign');
            // $table->dropForeign('students_units_id_foreign');
            $table->dropForeign('students_kelas_id_foreign');
        });
        Schema::dropIfExists('students');
    }
}
