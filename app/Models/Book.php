<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable=[
        'book_name',
        'author',
   ];
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
