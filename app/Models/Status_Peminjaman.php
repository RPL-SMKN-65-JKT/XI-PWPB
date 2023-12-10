<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'status_peminjaman';
    protected $guarded = ['id'];
}
