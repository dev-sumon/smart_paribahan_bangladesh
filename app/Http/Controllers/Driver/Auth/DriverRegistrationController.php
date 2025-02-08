<?php

namespace App\Http\Controllers\Driver\Auth;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;
use Illuminate\Support\Facades\Hash;

class DriverRegistrationController extends Controller
{
    public function registerForm(): View
    {
        return view('driver.auth.register');
    }
    public function register(DriverRequest $request)
    {
        $save = new Driver();

        $save->name = $request->name;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->password = Hash::make($request->password);
    
        // dd($request->all());
        
        $save->save();
        return redirect()->route('f.home');
    }
    // public function update($id): View
    // {
    //     $data['driver'] = Driver::findOrFail($id);
    //     return view('driver.dashboard.dashboard', $data);
    // }




}
