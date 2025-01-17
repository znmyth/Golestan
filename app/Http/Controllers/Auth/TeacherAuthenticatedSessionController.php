<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TeacherAuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login_teacher');
    }

    public function store(Request $request)
    {
        $credentials = $request->only('national_id', 'password');
        
        if (Auth::attempt(['national_id' => $credentials['national_id'], 'password' => $credentials['password']])) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'national_id' => 'اطلاعات وارد شده نامعتبر است.',
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

