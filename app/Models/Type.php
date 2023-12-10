<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function classification()
    {
        return $this->belongsTo(Classification::class, 'classification_id');
    }
}
