<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
     public function create()
    {
        return view('student.report.index'); // sesuaikan path view kamu
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

        $path = null;
        if ($request->hasFile('evidence')) {
            $path = $request->file('evidence')->store('evidence', 'public');
        }

        Report::create([
            'student_id'    => session('student')->id,
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
