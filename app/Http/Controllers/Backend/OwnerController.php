<?php

namespace App\Http\Controllers\Backend;

use App\Models\Owner;
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
        return view('backend.owner.create');
    }
    public function store(OwnerRequest $request): RedirectResponse
    {
        $save = new Owner();
        $save->name = $request->name;
        $save->description = $request->description;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->license_number = $request->license_number;
        $save->blood_group = $request->blood_group;
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
        return view('backend.owner.edit', $data);
    }
    public function update_store(OwnerRequest $request, $id): RedirectResponse
    {
        $update = Owner::findOrFail($id);

        $update->name = $request->name;
        $update->description = $request->description;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->license_number = $request->license_number;
        $update->blood_group = $request->blood_group;
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
}
