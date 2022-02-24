<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable=[
      'message',
      'receiver_id',
        'user_id'
    ];
    public  function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
