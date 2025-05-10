<?php

namespace App\Http\Controllers\Backend\Auth\ForgotPassword;

use App\Models\Admin;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\ForgtoPasswordOtpMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('backend.auth.forgot');
    }
    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return back()->with('error', 'এই ইমেইল দিয়ে কোনো একাউন্ট নেই');
        }
        $otp = rand(100000, 999999);
        $role = 'admin';

        DB::table('admin_password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['otp' => $otp, 'created_at' => now()]
        );

        Mail::to($request->email)->send(new ForgtoPasswordOtpMail($otp, $role));

        return redirect()->route('admin.verify.form')->with('email', $request->email);
    }


    public function showVerifyForm()
    {
        return view('backend.auth.verify');
    }

    public function checkOtp(Request $request)
    {
        $request->validate(['email' => 'required|email', 'otp' => 'required']);
        $record = DB::table('admin_password_resets')
            ->where('email', $request->email)
            ->where('otp', $request->otp)
            ->first();

        if ($record) {
            return redirect()->route('admin.reset.form')->with('email', $request->email);
        }
        return back()->withErrors(['otp' => 'Invalid OTP']);
    }

    public function showResetForm()
    {
        return view('backend.auth.reset');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6'
        ]);

        Admin::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('admin_password_resets')->where('email', $request->email)->delete();

        return redirect()->route('admin.login')->with('status', 'Password reset successfully!');
    }
    public function index(): View
    {
        return view('backend.auth.forgot');
    }
}
