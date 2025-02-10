<?php

namespace App\Http\Controllers\Owner\Auth;

use App\Models\Owner;
use Illuminate\Http\Request;
use App\Http\Requests\OwnerRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class OwnerSignupController extends Controller
{
    public function signupForm():View
    {
        return view('owner.auth.signup');
    }

    public function register(OwnerRequest $request)
    {
        $save = new Owner();

        $save->name = $request->name;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->password = Hash::make($request->password);
        
        // dd($save);

        $save->save();
        return redirect()->route('f.home');
    }
}
