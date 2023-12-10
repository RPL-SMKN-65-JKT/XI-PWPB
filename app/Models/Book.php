<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Cviebrock\EloquentSluggable\Sluggable;

class Book extends Model
{
    use HasFactory;
    use Sluggable;

    // protected $fillable = [
    //     'book_code', 'title', 'cover', 'slug', 'tanggal_terbit', 'penerbit', 'bahasa', 'deskripsi', 'penulis', 'halaman', 'bahasa'
    // ];

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function classification()
    {
        return $this->belongsTo(Classification::class, 'classification_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id');
    }
}
