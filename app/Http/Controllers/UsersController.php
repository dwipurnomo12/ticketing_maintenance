<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index', [
            'users' => User::whereNot('role_id', '1')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create', [
            'roles'     => Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required',
            'password'  => 'required|min:4',
            'role_id'   => 'required'
        ], [
            'name.required'     => 'Tidak boleh kosong !',
            'email.required'    => 'Tidak boleh kosong !',
            'password.required' => 'Tidak boleh kosong !',
            'password.min'      => 'Minimal 4 Karakter !',
            'role_id.required'  => 'Tidak boleh kosong !',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'role_id'   => $request->role_id
        ]);

        return redirect('/users')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user  = User::find($id);
        $roles = Role::all();

        return view('users.edit', [
            'user'  => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email',
            'role_id'   => 'required',
        ], [
            'name.required'     => 'Tidak boleh kosong !',
            'email.required'    => 'Tidak boleh kosong !',
            'email.email'       => 'Format email tidak valid !',
            'role_id.required'  => 'Tidak boleh kosong !',
        ]);

        if ($request->filled('password')) {
            $validator->addRules([
                'password' => 'required|min:4',
            ])->addMessages([
                'password.required' => 'Tidak boleh kosong !',
                'password.min'      => 'Minimal 4 Karakter !',
            ]);
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role_id');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect('/users')->with('success', 'Data pengguna berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data !');
    }
}
