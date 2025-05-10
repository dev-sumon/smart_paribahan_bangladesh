<?php

namespace App\Http\Controllers\Owner\Auth\ForgotPassword;

use App\Models\Owner;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\ForgtoPasswordOtpMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class OwnerForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('owner.auth.forgot');
    }
    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $owner = Owner::where('email', $request->email)->first();

        if (!$owner) {
            return back()->with('error', 'এই ইমেইল দিয়ে কোনো একাউন্ট নেই');
        }
        $otp = rand(100000, 999999);
        $role = 'owner';

        DB::table('owner_password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['otp' => $otp, 'created_at' => now()]
        );

        Mail::to($request->email)->send(new ForgtoPasswordOtpMail($otp, $role));

        return redirect()->route('owner.verify.form')->with('email', $request->email);
    }


    public function showVerifyForm()
    {
        return view('owner.auth.verify');
    }

    public function checkOtp(Request $request)
    {
        $request->validate(['email' => 'required|email', 'otp' => 'required']);
        $record = DB::table('owner_password_resets')
            ->where('email', $request->email)
            ->where('otp', $request->otp)
            ->first();

        if ($record) {
            return redirect()->route('owner.reset.form')->with('email', $request->email);
        }
        return back()->withErrors(['otp' => 'Invalid OTP']);
    }

    public function showResetForm()
    {
        return view('owner.auth.reset');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6'
        ]);

        Owner::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('owner_password_resets')->where('email', $request->email)->delete();

        return redirect()->route('owner.login')->with('status', 'Password reset successfully!');
    }
    public function index(): View
    {
        return view('owner.auth.forgot');
    }
}
