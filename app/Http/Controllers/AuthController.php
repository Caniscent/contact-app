<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Auth;
use App\Models\ContactModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth as Authorize;

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
            "username" => "required|min:3|unique:users,username", // Assuming auth data is in 'users' table
            "password" => "required|min:6",
            "email" => "required|email|unique:contacts,email", // Updated to match the table name
            "phone" => "required|numeric|unique:contacts,phone", // Updated to match the table name
            "address" => "required|unique:contacts,address",
        ]);

        DB::beginTransaction(); // Ensure you commit or rollback
        try {
            // Create contact
            $contact = ContactModel::create([
                "name" => $request->name,
                "email" => $request->email,
                "phone" => $request->phone,
                "address" => $request->address,
            ]);

            DB::commit();
            return redirect()->route("login")->with('success', 'User registered successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Registration failed: ' . $e->getMessage()]);
        }

        Auth::create([
            "contact_id" => $contact->id,
            "name" => $request->name,
            "username" => $request->username,
            "password" => bcrypt($request->password),
        ]);
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
