<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use TCG\Voyager\Models\User;

class VoyagerAuthController extends Controller
{
    public function login()
    {
        return view('voyager::login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'email' => 'These credentials do not match our records.',
            ]);
        }

        Auth::login($user, $request->has('remember'));
        return redirect('/admin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('voyager.login');
    }
}
