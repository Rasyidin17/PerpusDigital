<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user  = User::latest()->paginate(5);

        return view('admin.user.index', compact('user'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'nickname' => 'required',
            'full_name' => 'required',
            'no_tlp' => 'required',
            'jk' => 'required',
        ]);

        // Generate email berdasarkan nickname
        $email = Str::slug($request->nickname) . '@gmail.com';

        User::create([
            'nickname' => $request->nickname,
            'full_name' => $request->full_name,
            'no_tlp' => $request->no_tlp,
            'jk' => $request->jk,
            'email' => $email, // Gunakan email yang di-generate
            'password' => bcrypt('12345678'),
            'type' => 0,
        ]);

        return redirect()->route('users.index')->with('success', 'Account Berhasil Ditambahkan!');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
