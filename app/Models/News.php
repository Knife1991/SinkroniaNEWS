<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'body',
        'img',
        'category_id'
    ];

    public function category(){
        return $this->belongTo(Category::class);
    }
}
