<?php

namespace App\Http\Controllers\Backend;

use App\Models\Owner;
use App\Models\Stand;
use App\Models\Thana;
use App\Models\Union;
use App\Models\Vehicle;
use App\Models\District;
use App\Models\Division;
use App\Models\BloodGroup;
use Illuminate\Http\Request;
use App\Http\Requests\OwnerRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class OwnerController extends Controller
{
    public function index(): View
    {
        $data['owners'] = Owner::latest()->get();
        return view('backend.owner.index', $data);
    }
    public function create(): View
    {
        $data['divisions'] = Division::with( ['districts', 'thanas', 'unions', 'stands'])->latest()->get();
        $data['bloods'] = BloodGroup::latest()->get();
        // $data['vehicles'] = Vehicle::latest()->get();
        // $data['divisions'] = Division::latest()->get();
        return view('backend.owner.create', $data);
    }
    public function store(OwnerRequest $request): RedirectResponse
    {
        $save = new Owner();
        $save->name = $request->name;
        $save->description = $request->description;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->vehicles_license = $request->vehicles_license;
        $save->blood_group_id = $request->blood_group_id;
        $save->division_id = $request->division_id;
        $save->district_id = $request->district_id;
        $save->thana_id = $request->thana_id;
        $save->union_id = $request->union_id;
        $save->vehicle_id = $request->vehicle_id;
        $save->stand_id = $request->stand_id;
        $save->password = $request->password;
        $save->status = $request->status ?? 0;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = $request->name . time(). '.' .$image->getClientOriginalExtension();
            $path = $image->storeAs("owner/", $filename, 'public');
            $save->image = $path;
        }

        $save->save();
        return redirect()->route('owner.index');
    }
    public function update($id): View
    {
        $data['owner'] = Owner::with('division', 'district', 'thana', 'union', 'stand')->findOrFail($id);
        $data['bloods'] = BloodGroup::latest()->get();
        // $data['vehicles'] = Vehicle::all();
        return view('backend.owner.edit', $data);
    }
    public function update_store(OwnerRequest $request, $id): RedirectResponse
    {
        $update = Owner::findOrFail($id);

        $update->name = $request->name;
        $update->description = $request->description;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->vehicles_license = $request->vehicles_license;
        $update->blood_group_id = $request->blood_group_id;
        $update->division_id = $request->division_id;
        $update->district_id = $request->district_id;
        $update->thana_id = $request->thana_id;
        $update->union_id = $request->union_id;
        $update->vehicle_id = $request->vehicle_id;
        $update->stand_id = $request->stand_id;
        $update->status = $request->status ?? 0;

        if($request->password){
            $update->password = $request->password;
        }

        if($request->hasFile('image'));
            if($update->iamge && Storage::exists($update->image)){
                Storage::delete($update->image);
            }
        $image = $request->file('image');
        $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs("owner/", $filename, 'public');
        $update->image = $path;

        $update->save();
        return redirect()->route('owner.index');
    }
    public function status($id): RedirectResponse
    {
        $owner = Owner::findOrFail($id);
        if($owner->status == 1){
            $owner->status = 0;
        }else{
            $owner->status = 1;
        }
        $owner->save();
        return redirect()->route('owner.index');
    }
    public function delete($id): RedirectResponse
    {
        $owner = Owner::findOrFail($id);
        $owner->delete();

        return redirect()->route('owner.index');
    }
    public function detalis($id): View
    {
        $data['owner'] = Owner::with('division', 'district', 'thana', 'union', 'blood_group', 'vehicle', 'stand')->findOrFail($id);
        return view('backend.owner.show', $data);
    }
}
