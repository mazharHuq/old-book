<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable=[
        'book_name',
        'user_id',
        'admin_id',
        'author',
        'details',
        'used',
        'buy_price',
        'image',
        'sell_price',
        'img'
   ];
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);

    }
    public function admin(){
        return $this->belongsTo(Admin::class);

    }
}
