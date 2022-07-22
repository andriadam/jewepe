<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        return view('course', [
            'courses' => Course::latest()->get()
        ]);
    }
}
