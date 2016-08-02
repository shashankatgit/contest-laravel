<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserLoginController extends Controller
{
    public function getLogin()
    {
        if (\Auth::guard('users')->check()) {
            return redirect()->route('user.home');
        }
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password']
        ];
        if (\Auth::guard('users')->attempt($credentials)) {
            return redirect()->route('user.home');
        } else
            return redirect()->route('getLogin')->with(['fail'=>'Invalid Credentials']);
    }

    public function getLogout()
    {
        \Auth::guard('users')->logout();
        return redirect()->route('getLogin');
    }
}
