<?php

namespace App\Http\Controllers\Auth\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{

    //
    public function signin(Request $request) {
        
        $login_email = $request->input('login-email');
        $login_password = $request->input('login-password');
        $login_remember = $request->input('login-remember');
        if (Auth::attempt(['email' => $login_email, 'password' => $login_password], $login_remember)) {
            // check if exceed over trial period.
            $user = User::where('email', $login_email)->first();
            if ($user->role != 'SA') {
                $now = time();
                $register_date = strtotime($user->created_at);
                if (round(($now - $register_date) / 86400) > 30) {
                    return back()->withErrors(["fail" => true, "message" => "Üle prooviperiood 30 päeva"]);    
                }
            }
            return redirect('/admin');
        } else {
            return back()->withErrors(["fail" => true]);
        }
    }

    public function signup(Request $request) {
        $register_username = $request->input('register-username');
        $register_company = $request->input('register-company');
        $register_email = $request->input('register-email');
        $register_password = $request->input('register-password');
        $user = User::where('email', $register_email)->first();
        if ($user != null) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'Email already exist',
                ]);
        } else {
            User::create([
                'company'      => $register_company,
                'name'      => $register_username,
                'email'     => $register_email,
                'password'  => bcrypt($register_password),
                'role'      => 'A',
            ]);
            return redirect('/signin');
        }
    }

    public function signout(Request $request) {
        if (Auth::check()) {
            // $this->analyticlog('SignOut');
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        return redirect()->route('index');
    }
}
