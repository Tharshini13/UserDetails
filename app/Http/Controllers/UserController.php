<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\Hash;
use Illuminate\support\facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function loadRegister() {
        return view('/register');
    }

    public function Register(Request $request) {

        $request->validate([
            'name' => "required|string",
            'email' => "required|email",
            'password' => "required|string",
        ]);

        try {
            $new_user = new User;
            $new_user->name = $request->name;
            $new_user->email = $request->email;
            $new_user->password = Hash::make($request->password);
            $new_user->save();

            return redirect('/login')->with('success', 'Register successful');

        } catch (\Exception $e) {
            return redirect('/register')->with('fail', $e->getMessage());
        }
    }

    public function loadLogin() {
        return view('login');
    }

    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        $adminEmail = 'admin@example.com';
        $adminPassword = 'admin123';
    
        if ($request->email === $adminEmail && $request->password === $adminPassword) {
            return redirect()->route('dashboard')->with('success', 'Welcome Admin!');
        }
    
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
    
        if (Auth::attempt($credentials)) {
            return redirect('/users');
        }
    
        return redirect()->route('login')->with('fail', 'Invalid email or password.');
    }
    
    
}
