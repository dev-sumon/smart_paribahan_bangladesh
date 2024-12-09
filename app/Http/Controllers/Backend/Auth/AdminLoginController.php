<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function adminLogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('backend.auth.login');
    }
    public function adminLoginCheck(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $check = Admin::where('email', $request->email)->first();
        if ($check) {
            if ($check->status == 1) {
                if (Auth::guard('admin')->attempt($credentials)) {
                    return redirect()->route('admin.dashboard');
                }
            }
        }
        return redirect()->route('admin.login');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
