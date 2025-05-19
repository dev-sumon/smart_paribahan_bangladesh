<?php

namespace App\Http\Controllers\Driver\Auth;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverLoginController extends Controller
{
    public function driverLogin()
    {
        if (Auth::guard('driver')->check()) {
            $slug = Auth::guard('driver')->user()->slug;
            return redirect()->route('driver.dashboard', ['slug' => $slug]);
        }
        return view('driver.auth.login');
    }
    public function driverLoginCheck(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $check = Driver::where('email', $request->email)->first();
        if ($check) {
            if ($check->status == 1) {
                if (Auth::guard('driver')->attempt($credentials)) {
                    $slug = Auth::guard('driver')->user()->slug;
                    return redirect()->route('driver.dashboard', ['slug' => $slug]);
                }
            }
        }
        return redirect()->route('driver.login')->withErrors(['login' => 'Invalid credentials or inactive account.']);
    }

    public function logout()
    {
        Auth::guard('driver')->logout();
        return redirect()->route('driver.login');
    }
}
