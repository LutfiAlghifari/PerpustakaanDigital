<?php

Schema::create('pengguna', function (Blueprint $table) {
    $table->string('user_id', 50)->primary();
    $table->string('nama', 50);
    $table->string('email', 50)->unique();
    $table->char('password', 50);
    $table->date('tanggal_bergabung');
});
