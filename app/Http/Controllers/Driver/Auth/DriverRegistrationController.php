<?php

namespace App\Http\Controllers\Driver\Auth;

use App\Models\Driver;
use App\Models\Division;
use App\Models\BloodGroup;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;
use Illuminate\Support\Facades\Hash;

class DriverRegistrationController extends Controller
{
    public function signupForm(): View
    {
        $data['bloods'] = BloodGroup::latest()->get();
        $data['divisions'] = Division::with( ['districts', 'thanas', 'unions', 'stands', 'owners'])->latest()->get();
        return view('driver.auth.register', $data);
    }
    public function signup(DriverRequest $request)
    {
        $save = new Driver();

        $save->name = $request->name;
        $save->description = $request->description;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->owner_id = $request->owner_id;
        $save->blood_group_id = $request->blood_group_id;
        $save->division_id = $request->division_id;
        $save->district_id = $request->district_id;
        $save->thana_id = $request->thana_id;
        $save->union_id = $request->union_id;
        $save->vehicle_id = $request->vehicle_id;
        $save->stand_id = $request->stand_id;
        $save->driving_license = $request->driving_license;
        $save->password = Hash::make($request->password);
    
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = $request->name . time(). '.' .$image->getClientOriginalExtension();
            $path = $image->storeAs("driver/", $filename, 'public');
            $save->image = $path;
        }
        
        $save->save();
        return redirect()->route('f.home');
    }
    // public function update($id): View
    // {
    //     $data['driver'] = Driver::findOrFail($id);
    //     return view('driver.dashboard.dashboard', $data);
    // }




}
