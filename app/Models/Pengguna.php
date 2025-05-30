<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'password',
        'tanggal_bergabung',
    ];

    protected $hidden = [
        'password',
    ];
}
