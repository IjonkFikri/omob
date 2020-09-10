<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('kelas_id')->unsigned();
            // $table->integer('students_id')->unsigned();
            // $table->integer('units_id')->unsigned();
            $table->text('judul_buku');
            $table->integer('jumlah_halaman');
            $table->boolean('status')->default('0');
            $table->timestamps();
            // relations data kelas dan user
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('students_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign('books_students_id_foreign');
            $table->dropForeign('books_users_id_foreign');
            // $table->dropForeign('books_units_id_foreign');
            $table->dropForeign('books_kelas_id_foreign');
        });
        Schema::dropIfExists('books');
    }
}
