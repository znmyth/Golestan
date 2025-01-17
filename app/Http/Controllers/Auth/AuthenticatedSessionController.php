<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(Request $request): View
    {
        $type = $request->input('type', 'student'); // مقدار پیش‌فرض 'student'
        
        if ($type === 'teacher') {
            return view('auth.login_teacher');
        }
        
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