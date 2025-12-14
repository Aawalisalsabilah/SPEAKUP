<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Statistik
        $stats = [
            'total' => Report::count(),
            'waiting' => Report::where('status', 'Menunggu')->count(),
            'process' => Report::where('status', 'Diproses')->count(),
            'done' => Report::where('status', 'Selesai')->count(),
            'rejected' => Report::where('status', 'Ditolak')->count(),
        ];

        // Laporan yang menunggu verifikasi
        $pendingReports = Report::with('student')
            ->where('status', 'Menunggu')
            ->orderBy('created_at', 'desc')
            ->get();

        // Untuk badge di sidebar
        $pendingCount = $stats['waiting'];

        return view('admin.dashboard', compact('stats', 'pendingReports', 'pendingCount'));
    }

    public function reports()
    {
        $reports = Report::with('student')
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'total' => Report::count(),
            'waiting' => Report::where('status', 'Menunggu')->count(),
            'process' => Report::where('status', 'Diproses')->count(),
            'done' => Report::where('status', 'Selesai')->count(),
            'rejected' => Report::where('status', 'Ditolak')->count(),
        ];

        $pendingCount = $stats['waiting'];

        return view('admin.reports', compact('reports', 'stats', 'pendingCount'));
    }

    public function updateStatus(Request $request, Report $report)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Diproses,Selesai,Ditolak',
            'admin_notes' => 'nullable|string|max:1000'
        ]);

        $report->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes
        ]);

        return back()->with('success', 'Status laporan berhasil diperbarui!');
    }
}
