<?php

namespace App\Http\Controllers\FieldWorker\Auth;

use App\Http\Controllers\Controller;
use App\Models\FieldWorker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FieldWorkerLoginController extends Controller
{

    public function fieldWorkerLogin()
    {
        if (Auth::guard('field_worker')->check()) {

            return redirect()->route('field_worker.dashboard');
        }
        return view('field_worker.auth.login');
    }
    public function FieldWorkerLoginCheck(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $check = FieldWorker::where('email', $request->email)->first();
        if($check){
            if($check->status == 1){
                if(Auth::guard('field_worker')->attempt($credentials)){
                    return redirect()->route('f.home');
                }
            }
        }
        return redirect()->route('field_worker.login')->with('error', 'Your Email Or Password Invalid');
        // return redirect()->route('field_worker.dashboard')->with('error', 'Your Email Or Password Invalid');;
    }
    public function logout()
    {
        Auth::guard('field_worker')->logout();
        return redirect()->route('field_worker.login');
    }

}
