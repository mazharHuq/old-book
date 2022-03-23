<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'chat_id',
        'sender_id',

        'message'
    ];

    public function user() {
        return $this->belongsTo(User::class,'sender_id','id');
    }
    public function chat(){
        return $this->belongsTo(Chat::class);
    }
    public function admin() {
        return $this->belongsTo(Admin::class);
    }
}
