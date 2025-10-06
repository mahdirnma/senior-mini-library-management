<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable=[
        'name',
        'phone',
        'age',
        'gender',
        'email',
        'is_active',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
