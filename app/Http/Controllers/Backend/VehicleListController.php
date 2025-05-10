<?php

namespace App\Http\Controllers\Backend;

use App\Models\Owner;
use App\Models\Stand;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VehicleListController extends Controller
{
    public function index(): View
    {
        $data['vehicles'] = Vehicle::latest()->get();
        $data['vehicle_type'] = VehicleType::latest()->get();
        return view('backend.vehicle.index', $data);
    }
    public function create(): view
    {
        $data['vehicle_types'] = VehicleType::latest()->get();
        $data['owners'] = Owner::latest('vehicle_id')->latest()->get();
        $data['drivers'] = Driver::whereNull('vehicle_id')->latest()->get();
        $data['stands'] = Stand::latest()->get();
        return view('backend.vehicle.create', $data);
    }
    public function store(VehicleRequest $request): RedirectResponse
    {
        
        $save = new Vehicle();
        $save->name = $request->name;
        $save->vehicle_licence = $request->vehicle_licence;
        $save->vehicle_type_id = $request->vehicle_type_id;
        $save->owner_id = $request->owner_id;
        $save->driver_id = $request->driver_id;
        $save->status = $request->status ?? 0;

        $imagePaths = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $img) {
                $filename = Str::slug($request->name) . '_' . time() . '_' . $img->getClientOriginalName();
                $path = $img->storeAs('vehicles', $filename, 'public');
                $imagePaths[] = $path;
            }
        }

        $save->image = json_encode($imagePaths);

        $save->save();


        if ($request->driver_id) {
            Driver::where('id', $request->driver_id)->update(['vehicle_id' => $save->id]);
        }
        if ($request->owner_id) {
            Owner::where('id', $request->owner_id)->update(['vehicle_id' => $save->id]);
        }
        return redirect()->route('vehicle.index');
    }
    // public function update($id): View
    // {
    //     $data['vehicle'] = Vehicle::findOrFail($id);
    //     $data['vehicle_types'] = VehicleType::latest()->get();
    //     return view('backend.vehicle.edit', $data);
    // }
    public function update($id): View
    {
        $data['vehicle'] = Vehicle::findOrFail($id);
        $data['vehicle_types'] = VehicleType::latest()->get();
        $data['drivers'] = Driver::latest()->get();
        $data['owners'] = Owner::latest()->get();
        return view('backend.vehicle.edit', $data);
    }

    public function update_store(VehicleRequest $request, $id)
    {
        $update = Vehicle::findOrFail($id);
        $update->name = $request->name;
        $update->vehicle_licence = $request->vehicle_licence;
        $update->vehicle_type_id = $request->vehicle_type_id;
        $update->owner_id = $request->owner_id;
        $update->driver_id = $request->driver_id;
        $update->status = $request->status ?? 0;


        if ($request->hasFile('image')) {
            if ($update->image) {
                $oldImages = json_decode($update->image, true);
                foreach ($oldImages as $oldImage) {
                    if (Storage::disk('public')->exists($oldImage)) {
                        Storage::disk('public')->delete($oldImage);
                    }
                }
            }

            $imagePaths = [];
            foreach ($request->file('image') as $img) {
                $filename = Str::slug($request->name) . '_' . time() . '_' . $img->getClientOriginalName();
                $path = $img->storeAs('vehicles', $filename, 'public');
                $imagePaths[] = $path;
            }
        
            $update->image = json_encode($imagePaths);
        }
        
        $update->update();
        
        if ($request->driver_id) {
            Driver::where('id', $request->driver_id)->update(['vehicle_id' => $update->id]);
        }
        if ($request->owner_id) {
            Owner::where('id', $request->owner_id)->update(['vehicle_id' => $update->id]);
        }
        
        return redirect()->route('vehicle.index');
        
    }
    public function status($id): RedirectResponse
    {
        $vehicle = Vehicle::findOrFail($id);
        if($vehicle->status == 1){
            $vehicle->status = 0;
        }else{
            $vehicle->status = 1;
        }
        $vehicle->save(); 
        return redirect()->route('vehicle.index');
    }
    public function delete($id): RedirectResponse
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return redirect()->route('vehicle.index');
    }
    public function detalis($id): view
    {
        $data['vehicle'] = Vehicle::findOrFail($id);
        $data['vehicle_types'] = VehicleType::latest()->get();
        $data['drivers'] = Driver::latest()->get();
        $data['owners'] = Owner::latest()->get();
        return view('backend.vehicle.show', $data);
    }

}
