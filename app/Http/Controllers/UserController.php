<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard.components.pages.user.index-user', compact('users'));
    }

    public function indexUser()
    {
        $user = Auth::user();
        return view('home.components.pages.detail-akun-home', compact('user'));
    }

    // Function Detail dan Update User
    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password_lama' => 'nullable|min:3', // Tambahkan validasi untuk password lama
            'password_baru' => 'nullable|required_with:password_baru_confirmation|min:3|confirmed', // Tambahkan validasi untuk password baru
            'alamat' => 'required',
            'no_telp' => 'required',
            'role_id' => 'required',
        ]);

        $data = $request->all();
        // Verifikasi password lama
        if (isset($data['password_lama'])) {
            if (Hash::check($data['password_lama'], $user->password)) {
                // Password lama sesuai, update password baru jika ada
                if (isset($data['password_baru'])) {
                    $data['password'] = Hash::make($data['password_baru']);
                }
            } else {
                // Password lama tidak sesuai, beri pesan error
                return redirect()->back()->withErrors(['password_lama' => 'Password lama tidak sesuai.']);
            }
        }
        // Update data pengguna
        $user->update($data);
        return redirect()->route('logout')->with('success', 'Update User Berhasil');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.components.pages.user.create-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',
            'alamat' => 'required',
            'no_telp' => 'required',
            'role_id' => 'required',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->input('password'));

        User::create($data);

        return redirect()->route('users.index')
            ->with('success', 'Data User Berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.components.pages.user.edit-user', compact('user'));
    }

    /**`
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:3',
            'alamat' => 'required',
            'no_telp' => 'required',
            'role_id' => 'required',
        ]);

        $data = $request->all();

        if (isset($data['password']) && !empty($data['password'])) {
            // Jika password diisi, maka update password baru
            $data['password'] = Hash::make($data['password']);
        } else {
            // Jika password tidak diisi, maka hapus data password dari array
            unset($data['password']);
        }

        $user->update($data);
        return redirect()->route('users.index')
            ->with('success', 'Data User Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Data User Berhasil dihapus');
    }
}
