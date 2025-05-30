<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
     protected $table = 'buku'; //
    protected $primaryKey = 'book_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'book_id', 'judul', 'isbn', 'penerbit', 'tahun_terbit', 'stok'
    ];
}
