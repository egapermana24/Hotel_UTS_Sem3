<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{

    public function create()
    {
        return view('login');
    }

    public function store(Request $request)
    {

        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($attributes)) {
            $request->session()->regenerate();

            return redirect(RouteServiceProvider::HOME)->with('success', 'Login Berhasil');
        }

        return redirect()->route('login')->with('loginError', 'Yang Anda input tidak valid.');
    }

    public function __invoke(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout Berhasil');
    }
}
