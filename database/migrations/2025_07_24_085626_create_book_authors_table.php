<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_book_authors_table.php

    public function up()
    {
        Schema::create('book_authors', function (Blueprint $table) {
            $table->ulid('bookauthor_id')->primary();
            $table->string('book_id');
            $table->string('author_id');
            $table->timestamps();

            $table->foreign('book_id')->references('book_id')->on('books')->onDelete('cascade');
            $table->foreign('author_id')->references('author_id')->on('authors')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_authors');
    }
};
