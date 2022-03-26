<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_name',
        'description',
        'phone',
        'price',
        'image',
        'address',
        'delivery',
        'category_id',
        'user_id'
    ];

    public function categories(){
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
