<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
     protected $fillable = ['title', 'content', 'work_id'];
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
    public function favorites(){
        return $this->hasMany(Favorite::class);
    }
    
    public function work(){
        return $this->belongsTo(Work::class);
    }
    
    public function User(){
        return $this->belongsTo(User::class);
    }
    
    
    use HasFactory;
}
