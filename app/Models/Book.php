<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_name'=>'required|max:10',
        'description'=>'required|max:25',
        'phone'=>'required|max:10',
        'price',
        'image',
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
