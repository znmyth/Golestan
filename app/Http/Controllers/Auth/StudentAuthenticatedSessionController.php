<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentAuthenticatedSessionController extends Controller
{
    public function create(Request $request): View
    {
        return view('auth.student_login');
    }
}

