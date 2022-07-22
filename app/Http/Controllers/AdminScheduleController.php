<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Registration;
use App\Models\Schedule;
use Illuminate\Http\Request;

class AdminScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.schedule.index', [
            'title' => 'jadwal kursus',
            'schedules' => Schedule::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.schedule.create', [
            'title' => 'kursus',
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
            'nama_kursus' => 'required',
            'waktu_kursus' => 'required',
        ]);
        // simpan ke database
        Schedule::create($validatedData);

        return redirect(route('admin.schedule.index'))->with('success', 'New Schedule has been added!');
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
    public function edit(Schedule $schedule)
    {
        return view('admin.schedule.edit', [
        'title' => 'jadwal kursus',
        'schedule' => $schedule,
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
            'nama_kursus' => 'required',
            'waktu_kursus' => 'required',
        ]);
        // simpan ke database
        Schedule::where('id', $id)->update($validatedData);

        return redirect(route('admin.schedule.index'))->with('success', 'New Schedule has been updated!');
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
        Registration::where('schedule_id', $id)->delete();
        Schedule::destroy($id);
        
        return redirect(route('admin.schedule.index'))->with('success', 'Schedule has been deleted!');
    }
}
