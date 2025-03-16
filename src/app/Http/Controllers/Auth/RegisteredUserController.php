<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class RegisteredUserController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function complete()
    {
        return view('auth.registration_completed');
    }
}
