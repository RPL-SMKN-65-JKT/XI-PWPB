<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_code');
            $table->string('title');
            $table->string('slug', 255)->nullable();
            $table->string('cover', 255)->nullable();
            $table->string('penulis');
            $table->string('penerbit');
            $table->string('tanggal_terbit');
            $table->string('halaman');
            $table->string('bahasa');
            $table->string('status')->default('in stock');
            $table->string('deskripsi');
            $table->unsignedBigInteger('classification_id');
            $table->foreign('classification_id')->references('id')->on('classification')->onDelete('cascade');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
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
        Schema::dropIfExists('books');
    }
};
