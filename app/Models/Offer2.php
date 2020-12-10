<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $attributes = [
        'name',
        'description',
        'localization',
        'photos',
        'grade'
    ];

    

    public function author(){
        return $this->hasOne(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
