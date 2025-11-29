<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function create()
    {
        return view('student.report.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'category'      => 'required|string',
            'is_anonymous'  => 'required|boolean',
            'description'   => 'required|string',
            'evidence'      => 'nullable|file|mimes:jpg,jpeg,png,mp4,pdf|max:4096',
        ]);

        $student = session('student');
        if (!$student) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $path = null;

        if ($request->hasFile('evidence')) {
            $path = $request->file('evidence')->store('evidence', 'public');
        }

        Report::create([
            'student_id'    => $student->id,
            'title'         => $request->title,
            'category'      => $request->category,
            'is_anonymous'  => $request->is_anonymous,
            'description'   => $request->description,
            'evidence'      => $path,
            'status'        => 'Menunggu',
        ]);

        return redirect()->route('laporan.create')->with('success', 'Laporan berhasil dikirim!');
    }
}
