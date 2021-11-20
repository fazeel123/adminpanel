<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index() {
        return view('layouts.index');
    }

    public function index_login() {
        return view('auth.login');
    }

    public function index_register() {
        return view('auth.register');
    }

    public function register(Request $request) {

        $credentials = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
        ]);

        if ($credentials->fails())
        {
            return redirect()->route('register')->with('errors', $credentials->errors()->all());

        } else {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('login');
        }
    }

    public function login(Request $request) {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended('dashboard');

        } else {

            return redirect()->route('login')->with('error', 'You have entered invalid login details!');
        }
    }

    public function index_dashboard() {

        $data['name'] = Auth::user()->name;

        return view('layouts.dashboard', $data);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->flush();

        return redirect()->route('index');
    }
}
