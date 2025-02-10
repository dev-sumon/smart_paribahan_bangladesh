<?php

namespace App\Http\Controllers\Owner\Auth;

use App\Models\Owner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OwnerLoginController extends Controller
{
    public function ownerLogin()
    {
        if (Auth::guard('owner')->check()) {
            return redirect()->route('owner.dashboard');
        }
        return view('owner.auth.login');
    }
    public function ownerLoginCheck(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $check = Owner::where('email', $request->email)->first();
        if ($check) {
            if ($check->status == 1) {
                if (Auth::guard('owner')->attempt($credentials)) {
                    return redirect()->route('f.home');
                }
            }
        }
        return redirect()->route('owner.login');
    }
    public function logout()
    {
        Auth::guard('owner')->logout();
        return redirect()->route('owner.login');
    }
}

