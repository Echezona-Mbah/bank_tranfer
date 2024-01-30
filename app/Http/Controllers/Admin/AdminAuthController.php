<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
        ]);

        $admin = new Admin([
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), 
            'is_admin'=>true,
        ]);

        $admin->save();


        return redirect()->route('admin.login')->with('success', 'Admin registered successfully!');
    }


    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
       // dd($request->all());

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin');
        } else {
            return redirect()->back()->withErrors(['loginError' => 'Invalid email or password']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
