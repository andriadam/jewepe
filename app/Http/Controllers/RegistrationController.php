<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Registration;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monolog\Registry;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class RegistrationController extends Controller
{
    public function create(Course $course)
    {
        return view('registration', [
            'course' => $course,
            'schedules' => Schedule::where('nama_kursus', $course->nama)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'schedule_id' => 'required',
        ]);
        // Upload Krs ke folder krs di storage
        if ($request->file('krs')) {
            $validatedData['krs'] = $request->file('krs')->store('/krs');
        }

        // simpan ke database
        Registration::create([
            'user_id' => Auth::user()->id,
            'schedule_id' => $validatedData['schedule_id'],
            'krs' => $validatedData['krs'],
            'status' => 'Menunggu konfirmasi',
        ]);

        return redirect('myRegistration')->with('success', 'Kursus telah berhasil didaftarkan');
    }

    public function myRegistration()
    {
        return view('myRegistration', [
            'registrations' => Registration::where('user_id', Auth::user()->id)->latest()->get()
        ]);
    }

    public function generatePDF(Registration $registration)
    {
        $data = Registration::where('user_id', Auth::user()->id)->where('id', $registration->id)->with('User', 'Schedule')->latest()->first();
        // return $data;
        $data = [
            'data' => $data
        ];

        $pdf = FacadePdf::loadView('generatePDF', $data);
        return $pdf->stream("bukti_pendaftaraan" . date('m/d/Y') . ".pdf", array("Attachment" => false));
    }
}
