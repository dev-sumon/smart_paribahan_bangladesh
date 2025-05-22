<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\QrCodeGenerate;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->with(['prompt' => 'select_account'])
            ->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            $user = Socialite::driver('google')
                ->setHttpClient(new Client(['verify' => false]))
                ->user();

            $findUser = User::where('google_id', $user->id)->first();

            if ($findUser) {
                Auth::login($findUser);
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('123456'),
                ]);
                Auth::login($newUser);
            }

            // Check if qr_token exists in session
            if (session()->has('qr_token')) {
                $token = session('qr_token');
                $qrData = QrCodeGenerate::where('token', $token)->first();

                if ($qrData) {
                    // Clear the session token after use
                    session()->forget('qr_token');
                    return redirect($qrData->url);
                }
            }

            return redirect()->route('f.home');

        } catch (\Exception $e) {
            return redirect('/')->withErrors('Login failed: ' . $e->getMessage());
        }
    }
}
