<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $student = session('student');

        if (!$student) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $reports = Report::where('student_id', $student->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'total'     => $reports->count(),
            'waiting'   => $reports->where('status', 'Menunggu')->count(),
            'process'   => $reports->where('status', 'Diproses')->count(),
            'done'      => $reports->where('status', 'Selesai')->count(),
            'rejected'  => $reports->where('status', 'Ditolak')->count(),
        ];

        return view('student.dashboard', [
            'student' => $student,
            'reports' => $reports,
            'stats'   => $stats,
        ]);
    }
}
