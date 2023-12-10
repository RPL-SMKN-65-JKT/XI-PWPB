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
            $table->string('slug');
            $table->string('author');
            $table->string('publisher');
            $table->string('publication_year');
            $table->string('isbn');
            $table->string('image');
            $table->text('description');
            $table->boolean('status');
            $table->boolean('ebook')->default(false);
            $table->string('link_ebook')->nullable();
            $table->unsignedBigInteger('classification_id');
            $table->unsignedBigInteger('type_id');
            $table->timestamps();

            $table->foreign('classification_id')->references('id')->on('classifications')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
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
