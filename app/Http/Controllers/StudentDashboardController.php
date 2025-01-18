<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $studentId = auth()->id(); 
        $grades = Grade::where('student_id', $studentId)->with('course')->get();

        // برگرداندن نمای 'student.dashboard' با متغیر 'grades'
        return view('student.dashboard', compact('grades'));
    }

    public function storeObjection(Request $request)
    {
        Objection::create([
            'student_id' => auth()->id(),
            'course_id' => $request->course_id,
            'objection_text' => $request->objection_text,
        ]);

        return redirect()->back()->with('success', 'Objection submitted successfully');
    }
}