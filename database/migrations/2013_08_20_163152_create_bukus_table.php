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
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->integer('total_pinjam')->default(0);
            $table->integer('total_download')->default(0);

            
            $table->string('nama');
            $table->string('slug')->nullable();
            $table->string('pengarang');
            $table->string('penerbit');
            $table->text('deskripsi');
            $table->integer('tahun_terbit');
            $table->string('halaman');
            $table->integer('jumlah_buku');
            $table->string('gambar');
            $table->string('kategori');
            $table->string('genre');
            $table->string('link_ebook')->nullable();
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
        Schema::dropIfExists('bukus');
    }
};
