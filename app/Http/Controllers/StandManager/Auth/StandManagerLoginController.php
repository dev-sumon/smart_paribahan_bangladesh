<?php

namespace App\Http\Controllers\StandManager\Auth;

use App\Models\StandManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StandManagerLoginController extends Controller
{
    public function standManagerLogin()
    {
        if (Auth::guard('stand_manager')->check()) {

            return redirect()->route('stand_manager.dashboard');
        }
        return view('stand_manager.auth.login');
    }
    public function standManagerLoginCheck(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $check = StandManager::where('email', $request->email)->first();
        if($check){
            if($check->status == 1){
                if(Auth::guard('stand_manager')->attempt($credentials)){
                    return redirect()->route('stand_manager.dashboard');
                }
            }
        }
        // return redirect()->route('stand_manager.dashboard')->with('error', 'Your Email Or Password Invalid');
        return redirect()->route('stand_manager.login')->with('error', 'Your Email Or Password Invalid');
    }
    public function logout()
    {
        Auth::guard('stand_manager')->logout();
        return redirect()->route('stand_manager.login');
    }
}
