<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $fillable=[
       'category_name',
       'img'
   ];
    public function books(){
        return $this->belongsToMany(Book::class);
    }
    public static function countBook($id)
    {
        $category=Category::find($id);
        $books=$category->books;
        return  count($books);
       
    }
}
