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
        Schema::create('rent_logs', function (Blueprint $table) {
            $table->id();
            $table->string('kode');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('buku_id');
            $table->foreign('buku_id')->references('id')->on('buku');

            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->date('dikembalikan')->nullable();
            $table->integer('hari_terlambat')->nullable();
            $table->integer('denda')->nullable();
            $table->string('status');

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
        Schema::dropIfExists('rent_logs');
    }
};
