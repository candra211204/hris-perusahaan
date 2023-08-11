<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function signUp()
    {
        return view('sign-up');
    }

    public function signIn()
    {
        return view('sign-in');
    }

    public function signInAction(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (isset($request->remember_me)) {
            $remember = true;
        } else {
            $remember = false;
        }

        if (Auth::attempt($validate, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('error', 'Email atau Password salah.');
    }

    public function signUpAction(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:5|max:50',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:8',
        ]);

        $validate['password'] = Hash::make($request->password);

        User::create($validate);

        return redirect('/sign-in')->with('success', 'Behasil registrasi, silahkan login.');
    }

    public function logoutAction(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/sign-in')->with('success', 'Berhasil logout.');
    }
}
