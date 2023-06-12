<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    //
    //Tambahan registrasi

    public function registrasiUser()
    {
        return view('user.register', [
            'title' => 'registrasi',
        ]);
    }
    public function registrasiAdmin()
    {
        return view('user.registeradmin', [
            'title' => 'registrasi'
        ]);
    }
    public function registrasiUserPost(Request $request)
    {
        $level = 'user';
        $file = $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('foto/user', $file, 'public');
        $data['photo'] = $file;
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'photo' => $data['photo'],
            'password' => Hash::make($request['password']),
            'level' => $level
        ]);
        return redirect('registrasi')->with('success', 'Account Berhasil Dibuat');
    }
    public function registrasiAdminPost(Request $request)
    {

        $data = ($request->all());
        $file = $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('foto/user', $file, 'public');
        $data['photo'] = $file;
        User::create($data);

        // $file = $request->file('photo')->getClientOriginalName();
        // $path = $request->file('photo')->storeAs('foto/user', $file, 'public');
        // $data['photo'] = $file;
        // $user->$request->name;
        // $user->status = $request->status;

        // User::create([
        //     'level' => $request['level'],
        //     'email' => $request['email'],
        //     'photo' => $data['photo'],
        //     'password' => Hash::make($request['password'])

        // ]);
        return redirect('/admin/register')->with('success', 'Account Berhasil Dibuat');
    }
}
