<?php

Schema::create('penulis', function (Blueprint $table) {
    $table->string('author_id', 50)->primary();
    $table->string('nama', 50);
    $table->string('kebangsaan', 50);
    $table->string('tanggal_lahir', 10);
});
