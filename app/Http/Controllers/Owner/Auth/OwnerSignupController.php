<?php

namespace App\Http\Controllers\Owner\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OwnerSignupController extends Controller
{
    public function signupForm():View
    {
        return view('owner.auth.signup');
    }
}
