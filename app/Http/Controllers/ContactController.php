<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;
use App\Models\User;
use Faker\Factory as Faker;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $username = $request->session()->get('user');
        // $contacts = [];
        // $faker = Faker::create();
        // for ($i = 1; $i <= 355; $i++) {
        //     $contacts[] = [
        //         'name' => $faker->name,
        //         'email' => $faker->unique()->safeEmail,
        //         'phone' => $faker->phoneNumber,
        //         'datetime' => $faker->dateTimeBetween('-10 years', 'now'),
        //     ];
        // }

        // $contacts = collect($contacts)->sortBy('name')->values()->all();
        $contacts = ContactModel::all();
        return view('pages.contact.index', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'phone.max' => 'Nomor HP kurang dari batas karakter.',
            'phone.max' => 'Nomor HP melebihi batas karakter.',
        ]);

        ContactModel::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
        ]);

        return redirect()->route('contact.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactModel $contact)
    {
        return view('pages.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactModel $contact)
    {
        $request->validate([
            'phone' => 'min:11|max:13',
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email||max:255',
            'address' => 'nullable|string|min:10|max:255',
        ], [
            'phone.min' => 'Nomor HP kurang dari batas karakter.',
            'phone.max' => 'Nomor HP melebihi batas karakter.',
        ]);

        $contact->update([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
        ]);

        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(ContactModel $contact)
    {
        $contact->delete();

        return redirect()->route('contact.index');
    }
}
