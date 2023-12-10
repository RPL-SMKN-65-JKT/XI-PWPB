<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentLogs extends Model
{
    use HasFactory;

    protected $table = 'rent_logs';

    protected $fillable = [
        'kode',
        'user_id',
        'buku_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'dikembalikan',
        'hari_terlambat',
        'denda',
        'status'
    ];


    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
