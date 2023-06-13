<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{public function works()   
{
    return $this->hasMany(Work::class);  
}
    use HasFactory;
}
