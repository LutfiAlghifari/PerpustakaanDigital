<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'loan_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'loan_id',
        'user_id',
        'book_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'user_id', 'user_id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'book_id', 'book_id');
    }
}
