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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('cover');
            $table->string('ebook_file');
            $table->string('category');
            $table->string('author');
            $table->string('publisher');
            $table->enum('book_type', ['ebook', 'book']);
            $table->integer('stock')->nullable();
            $table->text('summary');
            $table->date('date_of_issue');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
