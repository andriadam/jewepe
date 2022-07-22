<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class AdminRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.registration.index', [
            'registrations' => Registration::with('User', 'Schedule')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        return view('admin.registration.show', [
            'registration' => $registration
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // hapus ke database
        Registration::destroy($id);
        return redirect(route('admin.registration.index'))->with('success', 'Registration has been deleted!');
    }

    public function updateStatus(Request $request)
    {
        // Cek data request
        $validatedData = $request->validate([
            'id' => 'required',
            'status' => 'required',
        ]);
        // Update ke database
        Registration::where('id', $validatedData['id'])->update($validatedData);

        return redirect(route('admin.registration.show', $validatedData['id']))->with('success', 'Registration has been confirmed!');
    }
}
