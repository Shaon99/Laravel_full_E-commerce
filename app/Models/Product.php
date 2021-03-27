<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{  
    protected $fillable = [
        'title', 'category','featrue','price','discount','size','brand','stock','image','status',
    ];
    use HasFactory;
}
