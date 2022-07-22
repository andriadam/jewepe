<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.course.index', [
            'title' => 'kursus',
            'courses' => Course::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create', [
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
            'nama' => 'required',
            'keterangan' => 'required',
            'lama_kursus' => 'required',
        ]);

        // simpan ke database
        Course::create($validatedData);

        return redirect(route('admin.course.index'))->with('success', 'New Course has been added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('admin.course.edit', [
            'title' => 'kursus',
            'course' => $course,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Cek data request
        $validatedData = $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'lama_kursus' => 'required',
        ]);

        // update ke database
        Course::where('id', $id)->update($validatedData);

        return redirect(route('admin.course.index'))->with('success', 'New Course has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // hapus ke database
        Course::destroy($id);
        return redirect(route('admin.course.index'))->with('success', 'Course has been deleted!');
    }
}
