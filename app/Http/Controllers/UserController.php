<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });

    }

    public function index()
    {
        //print_r(gettype($this->user));
        if($this->user == null){
            return view("frontend.auth.login");
        }
        else{
            $statData = [];

            //return $courses;
            return view('frontend.pages.dashboard.index', compact('statData'));
        }
        //return view('backend.pages.dashboard.index');
    }
}
