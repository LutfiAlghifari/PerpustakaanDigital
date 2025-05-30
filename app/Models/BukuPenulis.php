<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuPenulis extends Model
{
    protected $table = 'buku_penulis';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'book_id', 'author_id'];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'book_id');
    }

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'author_id');
    }
}
