<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login_student');
    }

    public function store(Request $request)
    {
        $credentials = $request->only('student_id', 'password');
        
        if (Auth::attempt(['student_id' => $credentials['student_id'], 'password' => $credentials['password']])) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'student_id' => 'اطلاعات وارد شده نامعتبر است.',
        ]);
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

