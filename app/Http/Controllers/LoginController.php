<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('profile');
        }
        if ($request->isMethod('post')) {
            $request['login'] = strtolower($request['login']);
            $validated = $request->validate([
                'login' => 'required|max:30',
                'password' => 'required|max:30',
            ]);

            if (Auth::attempt($validated)) {
                $request->session()->regenerate();
                //$request->session()->put('role', );
                return redirect()->route('profile');
            }

            return back()->withErrors(['name' => 'The provided credentials do not match our records.']);
        }
        return view('login');
    }
}
