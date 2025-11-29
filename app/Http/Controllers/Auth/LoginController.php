<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'role'     => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        // === LOGIN STUDENT ===
        if ($request->role === 'student') {

            $student = Student::where('nim', $request->username)->first();

            if (!$student || !Hash::check($request->password, $student->password)) {
                return back()->with('error', 'NIM atau password salah');
            }

            session(['student' => $student]);

            return redirect()->route('student.dashboard');
        }

        // === LOGIN ADMIN ===
        if ($request->role === 'admin') {

            $admin = Admin::where('employee_code', $request->username)->first();

            if (!$admin || !Hash::check($request->password, $admin->password)) {
                return back()->with('error', 'Kode pegawai atau password salah');
            }

            session(['admin' => $admin]);

            return redirect()->route('dashboard.admin');
        }

        return back()->with('error', 'Role tidak dikenal');
    }
}
