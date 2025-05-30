<?php

Schema::create('peminjaman', function (Blueprint $table) {
    $table->string('loan_id', 50)->primary();
    $table->string('user_id', 50);
    $table->string('book_id', 50);
    $table->dateTime('tanggal_pinjam')->default(DB::raw('CURRENT_TIMESTAMP'));
    $table->dateTime('tanggal_kembali')->nullable();
    $table->enum('status', ['aktif', 'dikembalikan', 'terlambat'])->default('aktif');

    $table->foreign('user_id')->references('user_id')->on('pengguna')->onDelete('cascade');
    $table->foreign('book_id')->references('book_id')->on('buku')->onDelete('cascade');
});
