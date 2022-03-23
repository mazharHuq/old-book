<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index(){
        return  view('frontend.pages.dashboard.index');
    }
    public function premium(){
        if(!auth('web')->user()){
            return route('visitor');
        }
        $user=auth('web')->user();
        return view('frontend.pages.premium');
        return  $user;
    }
}
