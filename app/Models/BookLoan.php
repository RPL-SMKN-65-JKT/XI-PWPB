<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLoan extends Model
{
    use HasFactory;

    protected $table = 'book_loans';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function status()
    {
        return $this->belongsTo(Status_Peminjaman::class, 'status_id');
    }

    public function LoanPenalty()
    {
        return $this->hasOne(LoanPenalty::class, 'loan_id', 'id');
    }
}
