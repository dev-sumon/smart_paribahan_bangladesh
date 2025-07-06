<?php

namespace App\Http\Controllers\Backend;

use App\Models\Stand;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\VehicleTypeRequest;

class VehicleTypeController extends Controller
{
    public function index(): View
    {
        $data['vehicle_types'] = VehicleType::latest()->get();
        return view('backend.vehicle_type.index', $data);
    }
    public function create(): View
    {
        $data['stands'] = Stand::latest()->get();
        return view('backend.vehicle_type.create', $data);
    }
    public function store(VehicleTypeRequest $request): RedirectResponse
    {
        $save = new VehicleType();

        $save->name = $request->name;
        $save->stand_id = $request->stand_id;
        $save->status = $request->status ?? 0;


        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = $request->name . time(). '.' .$image->getClientOriginalExtension();
            $path = $image->storeAs("vehicle-type/", $filename, 'public');
            $save->image = $path;
        }

        $save->save();
        return redirect()->route('vehicle_type.index')->with('success', 'Vehicle Type Created successfully!');
    }
    public function update($id): View
    {
        $data['vehicle_type'] = VehicleType::findOrFail($id);
        $data['stands'] = Stand::latest()->get();
        return view('backend.vehicle_type.edit', $data);
    }
    public function update_store(VehicleTypeRequest $request, $id):RedirectResponse
    {
        $update = VehicleType::findOrFail($id);
        $update->name = $request->name;
        $update->stand_id = $request->stand_id;
        $update->status = $request->status ?? 0;


        if ($request->hasFile('image')) {
            if ($update->image && Storage::exists($update->image)) {
                Storage::delete($update->image);
            }
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("vehicle-type/", $filename, 'public');
            $update->image = $path;
        }
        $update->save();
        return redirect()->route('vehicle_type.index')->with('success', 'Vehicle Type updated successfully!');
    }
    public function status($id): RedirectResponse
    {
        $vehicle_type = VehicleType::findOrFail($id);
        if($vehicle_type->status == 1){
            $vehicle_type->status = 0;
        }else{
            $vehicle_type->status = 1;
        }
        $vehicle_type->save();
        return redirect()->route('vehicle_type.index')->with('success', 'Vehicle Type status updated successfully!');;
    }
    public function delete($id): RedirectResponse
    {
        $vehicle_type = VehicleType::findOrFail($id);
        $vehicle_type->delete();
        return redirect()->route('vehicle_type.index')->with('success', 'Vehicle Type deleted successfully!');
    }
    public function detalis($id): View
    {
        $data['vehicle_type'] = VehicleType::findOrFail($id);
        return view('backend.vehicle_type.show', $data);

    }
    
}
