<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->string('book_id', 50)->primary();
            $table->string('judul', 100);
            $table->string('isbn', 20)->unique();
            $table->string('penerbit', 50);
            $table->string('tahun_terbit', 4);
            $table->integer('stok');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};


