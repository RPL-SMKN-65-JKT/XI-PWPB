<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcceptEbook extends Model
{
    use HasFactory;

    protected $table = 'accept_ebook';

    protected $fillable = [
        'user_id',
        'buku_id',
        'tanggal',
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
