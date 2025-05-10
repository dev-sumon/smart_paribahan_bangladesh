<?php

namespace App\Http\Controllers\Driver;

use App\Models\Stand;
use App\Models\Thana;
use App\Models\Union;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\District;
use App\Models\Division;
use Illuminate\View\View;
use App\Models\BloodGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    // public function dashboard()
    // {
    //     return view('driver.dashboard.dashboard');
    // }


    public function dashboard($id)
    {
        $data['driver'] = Driver::findOrFail($id);
        $data['bloods'] = BloodGroup::latest()->get();
        $data['divisions'] = Division::latest()->get();
        $data['districts'] = District::latest()->get();
        $data['thanas'] = Thana::latest()->get();
        $data['unions'] = Union::latest()->get();
        $data['stands'] = Stand::latest()->get();
        $data['vehicles'] = Vehicle::latest()->get();

        return view('driver.dashboard.dashboard', $data);
    }


    public function district($division_id)
    {

        $districts = District::where('division_id', $division_id)->pluck('district', 'id');

        return response()->json($districts);
    }

    public function thana($district_id)
    {
        $thanas = Thana::where('district_id', $district_id)->pluck('thana', 'id');
        return response()->json($thanas);
    }

    public function union($thana_id)
    {
        $unions = Union::where('thana_id', $thana_id)->pluck('union', 'id');
        return response()->json($unions);
    }

    public function stand($union_id)
    {
        $stands = Stand::where('union_id', $union_id)->pluck('name', 'id');
        return response()->json($stands);
    }

    public function vehicle($stand_id)
    {
        $vehicles = Vehicle::where('stand_id', $stand_id)->pluck('name', 'id');
        return response()->json($vehicles);
    }





    public function driver_update($id): View
    {
        $data['driver'] = Driver::findOrFail($id);
        $data['divisions'] = Division::latest()->get();
        $data['districts'] = District::latest()->get();
        $data['thanas'] = Thana::latest()->get();
        $data['unions'] = Union::latest()->get();
        $data['stands'] = Stand::latest()->get();
        $data['vehicles'] = Vehicle::latest()->get();
        $data['bloods'] = BloodGroup::latest()->get();
        return view('driver.driver_update.index', $data);
    }




    public function driver_update_store(DriverRequest $request, $id)
    {
        $update = Driver::findOrFail($id);



        $update->name = $request->name;
        $update->description = $request->description;
        $update->designation = $request->designation;
        $update->email = $request->email;
        $update->phone = $request->phone;
        // $update->owner_id = $request->owner_id;
        // $update->driving_license = $request->driving_license;
        $update->blood_group_id = $request->blood_group_id;
        $update->division_id = $request->division_id;
        $update->district_id = $request->district_id;
        $update->thana_id = $request->thana_id;
        $update->union_id = $request->union_id;
        // $update->vehicle_id = $request->vehicle_id;
        $update->stand_id = $request->stand_id;
        $update->status = $request->status ?? 0;

        if ($request->password) {
            $update->password = $request->password;
        }

        // if($request->hasFile('image'));
        //     if($update->iamge && Storage::exists($update->image)){
        //         Storage::delete($update->image);
        //     }
        // $image = $request->file('image');
        // $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
        // $path = $image->storeAs("driver/", $filename, 'public');
        // $update->image = $path;

        if ($request->hasFile('image')) {
            if ($update->image && Storage::exists($update->image)) {
                Storage::delete($update->image);
            }
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("driver/", $filename, 'public');
            $update->image = $path;
        }


        $update->save();
        return redirect()->route('f.home');
    }
}
