<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index', [
            'title' => 'mahasiswa',
            'users' => User::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create', [
            'title' => 'mahasiwa',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Cek data request
        $validatedData = $request->validate([
            'nama' => 'required',
            'npm' => 'required|unique:users',
            'kelas' => 'required',
        ]);
        // simpan ke database
        User::create($validatedData);

        return redirect(route('admin.user.index'))->with('success', 'New User has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'title' => 'mahasiswa',
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Cek data request
        $validatedData = $request->validate([
            'nama' => 'required',
            'npm' => 'required',
            'kelas' => 'required',
        ]);
        // simpan ke database
        User::where('id', $id)->update($validatedData);

        return redirect(route('admin.user.index'))->with('success', 'New User has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Hapus baris di tabel relasinya lalu hapus di tabel tersebut
        Registration::where('user_id', $id)->delete();
        User::destroy($id);
        return redirect(route('admin.user.index'))->with('success', 'User has been deleted!');
    }
}
