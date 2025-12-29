<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\DB;


class AdminDashboardController extends Controller
{
    public function index()
    {
        $categoryStats = Report::query()
            ->select('category', DB::raw('COUNT(*) as total'))
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->groupBy('category')
            ->orderByDesc('total')
            ->get();

        // Statistik
        $stats = Report::query()
            ->selectRaw("COUNT(*) as total")
            ->selectRaw("SUM(CASE WHEN status='Menunggu' THEN 1 ELSE 0 END) as waiting")
            ->selectRaw("SUM(CASE WHEN status='Diproses' THEN 1 ELSE 0 END) as process")
            ->selectRaw("SUM(CASE WHEN status='Selesai' THEN 1 ELSE 0 END) as done")
            ->selectRaw("SUM(CASE WHEN status='Ditolak' THEN 1 ELSE 0 END) as rejected")
            ->first()
            ->toArray();


        // Laporan yang menunggu verifikasi
        $pendingReports = Report::with('student')
            ->where('status', 'Menunggu')
            ->orderBy('created_at', 'desc')
            ->get();

        // Untuk badge di sidebar
        $pendingCount = $stats['waiting'];

        return view('admin.dashboard', compact('stats', 'pendingReports', 'pendingCount', 'categoryStats'));
    }

    public function reports()
    {
        $sort = request('sort', 'created_at');
        $dir  = request('dir', 'desc');

        // tambah category_count
        $allowedSorts = ['title', 'category', 'status', 'created_at', 'category_count'];
        if (!in_array($sort, $allowedSorts)) $sort = 'created_at';
        if (!in_array($dir, ['asc', 'desc'])) $dir = 'desc';

        $q = Report::query()->with('student');

        if ($sort === 'category_count') {
            // subquery: total laporan per kategori
            $counts = Report::query()
                ->select('category', DB::raw('COUNT(*) as category_count'))
                ->groupBy('category');

            // join ke reports, lalu urutkan berdasarkan jumlah kategori
            $q->leftJoinSub($counts, 'cat', function ($join) {
                $join->on('reports.category', '=', 'cat.category');
            })
                ->select('reports.*')
                ->orderByRaw('COALESCE(cat.category_count, 0) ' . $dir)
                ->orderBy('reports.created_at', 'desc'); // tie-breaker biar stabil
        } else {
            $q->orderBy($sort, $dir);
        }

        $reports = $q->paginate(10)->withQueryString();

        // Stats (biarkan seperti punya kamu)
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
