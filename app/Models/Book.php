<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable=[
        'title',
        'description',
        'publication_date',
        'is_active',
    ];

    public function writers()
    {
        return $this->belongsToMany(Writer::class);
    }

    public function members()
    {
        return $this->belongsToMany(Member::class);
    }
}
