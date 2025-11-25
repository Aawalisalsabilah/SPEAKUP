<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentLoginController extends Controller
{
    public function index()
    {
        return view('student.auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'password' => 'required',
        ]);

        $student = Student::where('nim', $request->nim)->first();

        if (!$student || !Hash::check($request->password, $student->password)) {
            return back()->with('error', 'NIM atau password salah')->withInput();
        }

        session(['student' => $student]);

        return redirect('/dashboard');
    }
}
