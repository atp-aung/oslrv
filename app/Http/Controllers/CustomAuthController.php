<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials) && auth()->user()->is_admin) {
            Session::forget('cart');
            //return "Login by admin";
            return view('admin.dashboard');
        }
        if (Auth::attempt($credentials) && auth()->user()->is_admin==false) {
            Session::forget('cart');
            return redirect('/');            
        }
        return view('auth.login');
    }

    public function logoutAction()
    {
        Session::flush();        
        Auth::logout();
        return Redirect('/');
    }

    public function registration()
    {
        return view('auth.register');
    }

    public function registerSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        return "registration success";
    }
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
