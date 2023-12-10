<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->boolean('isAdmin')->default(false);
            $table->boolean('isMember')->default(false);
            $table->boolean('credentials')->default(false);
            $table->string('email')->unique();
            $table->string('name')->nullable();
            $table->integer('nis')->nullable();
            $table->enum('major', ['RPL', 'PFTV', 'MM'])->nullable();
            $table->string('class')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
