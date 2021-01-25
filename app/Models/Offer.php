<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'localization',
        'description',
        'coverImage',
        'images',
    ];
    

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function photo(){
        return $this->hasMany(Photo::class);
    }
}
