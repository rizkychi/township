<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.password.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::getUser();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('errors', 'Password lama tidak cocok');
        }

        if ($request->new_password == $request->old_password) {
            return back()->with('errors', 'Password baru tidak boleh sama dengan password lama');
        }

        if ($request->new_password != $request->confirm_password) {
            return back()->with('errors', 'Password baru tidak sama');
        }

        $u = User::find($user->id);

        $u->password = bcrypt($request->new_password);
        
        if ($u->update()) {
            return redirect()->route('admin.password.index')->with('success', 'Ganti password berhasil');
        } else {
            return back()->with('errors', 'Terjadi kesalahan, silahkan coba kembali');
        }
    }
}
