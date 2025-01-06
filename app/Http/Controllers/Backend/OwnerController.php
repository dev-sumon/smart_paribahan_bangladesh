<?php

namespace App\Http\Controllers\Backend;

use App\Models\Owner;
use Illuminate\Http\Request;
use App\Http\Requests\OwnerRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\BloodGroup;
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
        $data['bloods'] = BloodGroup::latest()->get();
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
        $data['owner'] = Owner::findOrFail($id);
        $data['bloods'] = BloodGroup::latest()->get();
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
        $data['owner'] = Owner::with('blood_group')->findOrFail($id);
        $data['owner'] = Owner::findOrFail($id);
        return view('backend.owner.show', $data);
    }
}
