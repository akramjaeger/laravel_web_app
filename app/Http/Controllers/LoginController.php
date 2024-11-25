<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\profile;


class LoginController extends Controller
{

    public function connect(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Profile::where('email', $credentials['email'])->first();
        $request->session()->put('user', $user);
        return redirect()->route('home');
    } else {
        return back()->withErrors([
            'email' => 'Email or password incorrect'
        ])->onlyInput('email');
    }
}

public function logout(Request $request)
{
    $request->session()->forget('user');
    $request->session()->flush();
    return to_route('home'); 
}
}
