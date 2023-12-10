<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanPenalty extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'loan_penalties';

    public function bookLoan()
    {
        return $this->belongsTo(BookLoan::class, 'loan_id', 'id');
    }
}
