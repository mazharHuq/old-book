<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function showLoginForm(Request $request)
    {
        return view('frontend.auth.login');
    }
    public function showRegisterForm(Request $request){

        return view('frontend.auth.register');
    }
    public function storeUser(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

       $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone'=>$request->phone,
            'password' => Hash::make($request->password),
        ]);


        if (Auth::guard('web')->attempt(['email' => $user->email, 'password' => $request->password])) {
            Session::flash('login_success', 'Successfully Logged in!');
            return redirect()->intended(route('user'));
        } else {
            Session::flash('error', 'Invalid Email or Passowrd!');
            return back();
        }


    }


    // Admin Login
    public function login(Request $request)
    {
        //return $request;
        //Validate Login Form Data
        $request->validate([
            'email' => 'required|email|',
            'password' => 'required'
        ]);

        //Try Logging in
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password],
            $request->remember)) {
            Session::flash('login_success', 'Successfully Logged in!');
            return redirect()->intended(route('user'));
        } else {
            Session::flash('error', 'Invalid Email or Passowrd!');
            return back();
        }
    }

    //Admin Logout
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('user.login');
    }
}
