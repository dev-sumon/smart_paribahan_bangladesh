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
        if(Auth::guard('driver')->check()){
           
            return redirect()->route('driver.dashboard');
        }
        return view('driver.auth.login');
    }
    public function driverLoginCheck(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $check = Driver::where('email', $request->email)->first();
        if($check){
            if($check->status == 1){
                if(Auth::guard('driver')->attempt($credentials)){
                    return redirect()->route('driver.dashboard');
                }
            }
        }
        return redirect()->route('driver.dashboard');
    }
    public function logout()
    {
        Auth::guard('driver')->logout();
        return redirect()->route('driver.login');
    }
}
