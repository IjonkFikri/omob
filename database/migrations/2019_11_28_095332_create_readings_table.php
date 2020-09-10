<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('readings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('kelas_id')->unsigned();
            // $table->integer('students_id')->unsigned();
            $table->integer('books_id')->unsigned();
            $table->integer('start');
            $table->integer('end');
            $table->integer('total_baca');
            $table->timestamps();
            // relations data kelas dan user
            // $table->foreign('students_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('books_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('readings', function (Blueprint $table) {
            // $table->dropForeign('readings_students_id_foreign');
            $table->dropForeign('readings_books_id_foreign');
            $table->dropForeign('readings_users_id_foreign');
            $table->dropForeign('readings_kelas_id_foreign');
        });
        Schema::dropIfExists('readings');
    }
}
