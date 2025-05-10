<?php

namespace App\Http\Controllers\Owner;

use App\Models\Owner;
use App\Models\Stand;
use App\Models\Thana;
use App\Models\Union;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\District;
use App\Models\Division;
use App\Models\BloodGroup;
use App\Models\VehicleType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\OwnerRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function dashboard($id): View{

        $data['owner'] = Owner::findOrFail($id);
        $data['divisions'] = Division::latest()->get();
        $data['districts'] = District::latest()->get();
        $data['thanas'] = Thana::latest()->get();
        $data['unions'] = Union::latest()->get();
        $data['stands'] = Stand::latest()->get();
        $data['vehicles'] = Vehicle::latest()->get();
        $data['bloods'] = BloodGroup::latest()->get();
        return view('owner.dashboard.dashboard', $data);
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
    

    public function owner_update($id): View
    {
        $data['owner'] = Owner::findOrFail($id);
        $data['divisions'] = Division::latest()->get();
        $data['districts'] = District::latest()->get();
        $data['thanas'] = Thana::latest()->get();
        $data['unions'] = Union::latest()->get();
        $data['stands'] = Stand::latest()->get();
        $data['vehicles'] = Vehicle::latest()->get();
        $data['bloods'] = BloodGroup::latest()->get();
        return view('owner.owner_update.index', $data);
    }

    public function owner_update_store(OwnerRequest $request, $id){
        $update = Owner::findOrFail($id);
        

        $update->name = $request->name;
        $update->description = $request->description;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->blood_group_id = $request->blood_group_id;
        $update->division_id = $request->division_id;
        $update->district_id = $request->district_id;
        $update->thana_id = $request->thana_id;
        $update->union_id = $request->union_id;
        $update->stand_id = $request->stand_id;

    
        // if($request->hasFile('image'));
        //     if($update->iamge && Storage::exists($update->image)){
        //         Storage::delete($update->image);
        //     }
        // $image = $request->file('image');
        // $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
        // $path = $image->storeAs("owner/", $filename, 'public');
        // $update->image = $path;

        if($request->hasFile('image')) {
            if($update->image && Storage::exists($update->image)){
                Storage::delete($update->image);
            }
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("owner/", $filename, 'public');
            $update->image = $path;
        }
        

        


        $update->save();
        
        return redirect()->route('f.home');
    }


    public function addVehicle(): View
    {
        $data['vehicle_types'] = VehicleType::latest()->get();
        $data['owner'] = auth('owner')->user();
        return view('owner.vechicle.index', $data);
    }
    public function addVehicleStore(VehicleRequest $request): RedirectResponse
    { 
        $save = new Vehicle();
        $save->name = $request->name;
        $save->vehicle_licence = $request->vehicle_licence;
        $save->vehicle_type_id = $request->vehicle_type_id;
        $save->owner_id = auth('owner')->user()->id;
        $save->driver_id = $request->driver_id;
        $imagePaths = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $img) {
                $filename = Str::slug($request->name) . '_' . time() . '_' . $img->getClientOriginalName();
                $path = $img->storeAs('vehicles', $filename, 'public');
                $imagePaths[] = $path;
            }
        }

        $save->image = json_encode($imagePaths);
        $save->status = $request->status ?? 0;

    
        $save->save();
        if ($request->driver_id) {
            Driver::where('id', $request->driver_id)->update(['vehicle_id' => $save->id]);
        }
        Owner::where('id', auth('owner')->user()->id)->update(['vehicle_id' => $request->vehicle_type_id]);
        return redirect()->route('owner.dashboard', ['id' => auth('owner')->user()->id]);
    }
        
    
}
