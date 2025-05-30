<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('buku_penulis', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string('book_id', 50);
            $table->string('author_id', 50);

            
            $table->unique(['book_id', 'author_id']);

            
            $table->index('author_id');

            
            $table->foreign('book_id')
                ->references('book_id')
                ->on('buku')
                ->onDelete('cascade');

            $table->foreign('author_id')
                ->references('author_id')
                ->on('penulis')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('buku_penulis');
    }
};

