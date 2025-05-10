<?php

namespace App\Http\Controllers\Driver\Auth\ForgotPassword;

use App\Mail\ForgtoPasswordOtpMail;
use App\Models\Driver;
use Illuminate\View\View;
use App\Models\FieldWorker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class driverForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('driver.auth.forgot');
    }
    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $driver = Driver::where('email', $request->email)->first();

        if (!$driver) {
            return back()->with('error', 'এই ইমেইল দিয়ে কোনো একাউন্ট নেই');
        }
        $otp = rand(100000, 999999);
        $role = 'driver';

        DB::table('driver_password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['otp' => $otp, 'created_at' => now()]
        );

        Mail::to($request->email)->send(new ForgtoPasswordOtpMail($otp, $role));

        return redirect()->route('driver.verify.form')->with('email', $request->email);
    }


    public function showVerifyForm()
    {
        return view('driver.auth.verify');
    }

    public function checkOtp(Request $request)
    {
        $request->validate(['email' => 'required|email', 'otp' => 'required']);
        $record = DB::table('driver_password_resets')
            ->where('email', $request->email)
            ->where('otp', $request->otp)
            ->first();

        if ($record) {
            return redirect()->route('driver.reset.form')->with('email', $request->email);
        }
        return back()->withErrors(['otp' => 'Invalid OTP']);
    }

    public function showResetForm()
    {
        return view('driver.auth.reset');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6'
        ]);

        Driver::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('driver_password_resets')->where('email', $request->email)->delete();

        return redirect()->route('driver.login')->with('status', 'Password reset successfully!');
    }
    public function index(): View
    {
        return view('driver.auth.forgot');
    }
}
