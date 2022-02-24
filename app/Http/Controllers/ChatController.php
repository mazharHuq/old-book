<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chats=Chat::all();
        $users=Admin::all();
        return view('backend.pages.chat.index',compact('chats','users'));
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
        $chat=new Chat();
        $chat->message=$request->message;
        $chat->user_id=$this->user->id;
        $chat->user_id2=$request->user_id2;
        $chat->save();
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
        $receiver=$id;
        $sender=$this->user->id;
        $chats=Chat::all();
        $users=Admin::all();
        $active_chats=DB::table('chats')
            ->where('user_id','=',$this->user->id )
            ->where( 'user_id2','=',$id)
            ->orWhere('user_id','=',$id )
            ->where('user_id2','=',$this->user->id)

            ->get();


        return view('backend.pages.chat.show',compact('chats','users','active_chats','sender','receiver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    }
}
