<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Login(){
        return view('pages.login');
    }
    public function Register(){
        return view('pages.register');
    }
    public function userRegister(Request $request){
        $request->validate([
            'password' => 'confirmed'
        ]);
        $RegisterUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
        ]);
        if($RegisterUser){
             return redirect('/register')->with('status', 'success')->with('message', 'Proses registrasi berhasil');
        }
         return redirect('/register')->with('status', 'failed')->with('message', 'Proses registrasi gagal');
    }
    public function userLogin(Request $request){   
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/verification');
        }
        return redirect('/login')->with('status', 'failed')->with('message', 'Login gagal');
    }
    public function Barcode(){
        return view('pages.barcode');
    }
    public function verification(){
        return view('pages.verification');
    }
    public function Dashboard(){
        return view('pages.dashboard');
    }
    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
