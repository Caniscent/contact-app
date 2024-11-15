<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use Illuminate\Support\Facades\Auth as Authorize;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view("auth/register");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|min:3|max:255",
            "username" => "required|min:3",
            "password" => "required|min:6",
        ]);

        Auth::create([
            "name" => $request->name,
            "username" => $request->username,
            "password" => bcrypt($request->password)
        ]);

        return redirect()->route("login");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Authorize::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }
}
