<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminLoginController extends Controller
{
    public function getLogin()
    {
        if (\Auth::guard('admins')->check()) {
            return redirect()->route('admin.home');
        }
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password']
        ];
        if (\Auth::guard('admins')->attempt($credentials)) {
            return redirect()->route('admin.home');
        } else
            return redirect()->route('getAdminLogin')->with(['fail' => 'It ain\'t easy being admin man!']);
    }

    public function getLogout()
    {
        \Auth::guard('admins')->logout();
        return redirect()->route('getAdminLogin');
    }
}
