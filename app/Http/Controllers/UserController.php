<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view('user.login', [
            'name' => 'Login',
            'title' => 'Login'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $user = User::find('email', 'password');
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if ($result = auth()->attempt($credentials) && Auth::user()) {

            if ($result && Auth::user()->level == 'admin') {
                return redirect('/student');
            }
            if ($result && Auth::user()->level == 'oprator') {
                return redirect('/student');
            }
            if ($result && Auth::user()->level == 'user') {
                return redirect('/mahasiswa');
            }
        } else {
            return redirect()->back()->with('error', 'Email atau Password salah !');
        }

        //$result = auth()->attempt($credentials);
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
    public function destroy(Request $request)
    {
        //
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
        // return session($id)->delete($id);
    }
}
