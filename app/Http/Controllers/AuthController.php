<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(){
        if(Auth::check()){
            return redirect()->back();
        }
        return view('auth.register');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'name'=> 'required',
            'username'=> 'required|unique:users',
            'password'=> 'required',
        ]);

        // $validateData['password'] = bcrypt($validateData['password']);
        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        // $request->session()->flash('success', 'Registrasi berhasil');
        return redirect('/login')->with('success', 'Registrasi akun berhasil');
    }

    public function login(){
        if(Auth::check()){
            return redirect()->back();
        }
        return view('auth.login');
    }

    public function authenticate(Request $request){
        
        $credentials =  $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // dd(Auth::spy());

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }else{
            return back()->with('loginError', 'Login gagal!');
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
