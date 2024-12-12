<?php

namespace App\Http\Controllers\Backend;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class VehicleListController extends Controller
{
    public function index(): View
    {
        $data['vehicles'] = Vehicle::latest()->get();
        return view('backend.vehicle.index', $data);
    }
    public function create(): view
    {
        return view('backend.vehicle.create');
    }
    public function store(VehicleRequest $request): RedirectResponse
    {
        $save = new Vehicle();
        $save->name = $request->name;
        $save->status = $request->has('status') ? $request->status : 0;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = $request->name . time(). '.' .$image->getClientOriginalExtension();
            $path = $image->storeAs("vehicle/", $filename, 'public');
            $save->image = $path;
        }

        $save->save();
        return redirect()->route('vehicle.index');
    }
    public function update($id): View
    {
        $data['vehicle'] = Vehicle::findOrFail($id);
        return view('backend.vehicle.edit', $data);
    }
    public function update_store(VehicleRequest $request, $id)
    {
        $update = Vehicle::findOrFail($id);
        $update->name = $request->name;
        $update->status = $request->status ?? 0;

        if($request->hasFile('image'));
            if($update->iamge && Storage::exists($update->image)){
                Storage::delete($update->image);
            }
        $image = $request->file('image');
        $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs("vehicle/", $filename, 'public');
        $update->image = $path;

        $update->update();
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
        return view('backend.vehicle.show', $data);
    }

}