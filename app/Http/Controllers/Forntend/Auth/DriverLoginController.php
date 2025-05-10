<?php

namespace App\Http\Controllers\Forntend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DriverLoginController extends Controller
{
    public function driverLogin()
    {
        if (Auth::guard('driver')->check()) {
            return redirect()->route('f.home');
        }
        return view('forntend.login');
    }
}
