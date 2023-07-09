<?php

namespace App\Http\Controllers;

use App\Mail\testMail;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
            $otp = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            $email = $request->input('email');
            Mail::to($email)->send(new testMail($otp));
            $request->session()->put('otp', $otp);
            return redirect()->intended('/verification');
        }
        return redirect('/')->with('status', 'failed')->with('message', 'Login gagal');
    }
    public function verification(){
        $user = User::where('email', Auth::user()->email)->first();
        return view('pages.verification', compact(['user']));
    }
    public function testVerification(Request $request){
        $user = User::where('email', Auth::user()->email)->first();
        $otp = $request->session()->get('otp');
        if ($request->input('input_otp') == $otp) {
        return redirect('/dashboard');
        } else {
            return view('pages.verification', compact(['user']))->with('status', 'failed')->with('message', 'kode otp salah');
        }
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
