<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $userData = $request->only('email', 'password');

        if(Auth::attempt($userData))
        {
            return redirect(route('admin.index'));
        }

        session()->flash('error', 'Wrong Email or Password');
        return redirect(route('admin.loginPage'));

    }

    public function logOut()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('admin.loginPage'));
    }
}
?>