<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';
    
    protected $fillable = [
        'role_id',
        'buku_id',
        'izin_ebook',

        'nama',
        'slug',
        'email',
        'telepon',
        'alamat',
        'foto',

        'username',
        'password',
    ];


    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }


    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }




    public function rentlogs()
    {
        return $this->hasMany(RentLogs::class, 'user_id');
    }

    public function acceptEbook()
    {
        return $this->hasMany(AcceptEbook::class, 'user_id');
    }

    public function ebook()
    {
        return $this->hasMany(Ebook::class, 'user_id');
    }

    





    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'username'
            ]
        ];
    }






    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = [
        'role_id' => 2,
    ];
   
}
