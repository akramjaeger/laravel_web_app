<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $profiles = profile::all();
        return view('dashboard',compact('profiles'));
    }

    public function create()
    {
        return view('/register');
    }

    public function login1(Request $request)
    {

        return view('login'); 
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        
        //validation

        $formFields = $request->validate([
            'name' => 'required|between:3,30',
            'email' => 'required|email|unique:profiles',
            'password' => 'required|between:10,30|confirmed'
        ]);

        //Hash
        $password = $request->password;
        $formFields['password'] = Hash::make($password);

        //insertion

        profile::create($formFields);
        /*
        profile::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);*/
        return redirect()->route('login.profile')->with('success','Votre Compte a éte crée avec success');
    }

    public function destroy($id)
    {
        $profile = profile::findOrFail($id);
        $profile->delete();
        return redirect()->route('dashboard');
    }
}
