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
            $table->increments('id');
            $table->string('title_english');
            $table->string('title_arabic');
            $table->string('author_english');
            $table->string('author_arabic');
            $table->text('description_english')->nullable();
            $table->text('description_arabic')->nullable();
            $table->string('genre');
            $table->string('language'); // 'english', 'arabic', or 'bilingual'
            $table->integer('pages')->nullable();
            $table->year('publication_year')->nullable();
            $table->string('isbn')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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
