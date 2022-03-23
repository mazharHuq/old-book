<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Chat;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mpdf\Tag\P;

class UserChatController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            if($this->user){
                return $next($request);

            }else{
                return redirect('user/login');
            }
        });

    }
    public function index()
    {

       $chatRoom=Chat::where([
           ['user_id','=',$this->user->id],
               ['user_type','=',0  ]
       ])->OrWhere(
                   [
                       ['receiver_type','=',0],['receiver_id','=',$this->user->id]
                   ])->get();
       //return $chatRoom;

        return  view('frontend.pages.dashboard.chat.index',compact('chatRoom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $message=new \App\Models\Message();
       $message->chat_id=$request->chat;
       $message->chat_id=$request->chat;
       $message->message=$request->message;
       $message->sender_id=$this->user->id;
       $message->save();
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=$this->user;
        $receiver=User::find($id);
        $chat=Chat::where('user_id',$user->id)->where('user_type',0)->where('receiver_id',$id)->where
            ('receiver_type',0)->first();
        if(!$chat){
            $chat=Chat::where('user_id',$id)->where('user_type',0)->where('receiver_id',$user->id)->where
            ('receiver_type',0)->first();
        }
        if(!$chat)
       $chat= Chat::create([
            'user_id'=>$user->id,
            'user_type'=>0,
            'receiver_id'=>$id,
            'receiver_type'=>0
        ]);
        $chatRoom=Chat::where([
            ['user_id','=',$this->user->id],
            ['user_type','=',0  ]
        ])->OrWhere(
            [
                ['receiver_type','=',0],['receiver_id','=',$this->user->id]
            ])->get();
        //return $chatRoom;
        return  view('frontend.pages.dashboard.chat.show',compact('chatRoom','chat'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
