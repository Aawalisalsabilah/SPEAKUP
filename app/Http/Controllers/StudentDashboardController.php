<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $student = session('student');

        $reports = Report::where('student_id', $student['id'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('student.dashboard', compact('student', 'reports'));
    }
}
