<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable=[
      'message',
      'receiver_id',
        'user_id','user_type','receiver_type'
    ];
    public  function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function message(){
        return $this->hasMany(Message::class,'chat_id','id');
    }
    public static function reciever($user){
        if($user->user_id==auth('web')->user()->id){
            $otherUser=$user->receiver_id;
            if($user->receiver_type==0){
              return User::find($otherUser);
            }else{
              return  Admin::find($otherUser);
            }
        }else{
            $otherUser=$user->user_id;
            if($user->user_type==0){
            return  User::find($otherUser);
            }else{
              return  Admin::find($otherUser);
            }
        }


    }
}
