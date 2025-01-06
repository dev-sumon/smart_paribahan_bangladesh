<?php

namespace App\Http\Controllers\Backend;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;
use App\Models\BloodGroup;
use App\Models\Owner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class DriverController extends Controller
{
    public function index(): View
    {
        $data['drivers'] = Driver::latest()->get();
        return view('backend.driver.index', $data);
    }
    public function create(): View
    {
        $data['owners'] = Owner::latest()->get();
        $data['bloods'] = BloodGroup::latest()->get();
        return view('backend.driver.create', $data);
    }
    public function store(DriverRequest $request): RedirectResponse
    {
        $save = new Driver();

        $save->name = $request->name;
        $save->description = $request->description;
        $save->designation = $request->designation;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->owner_id = $request->owner_id;
        $save->driving_license = $request->driving_license;
        $save->blood_group_id = $request->blood_group_id;
        $save->password = $request->password;
        $save->status = $request->status ?? 0;


        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = $request->name . time(). '.' .$image->getClientOriginalExtension();
            $path = $image->storeAs("driver/", $filename, 'public');
            $save->image = $path;
        }

        $save->save();
        return redirect()->route('driver.index');
    }
    public function update($id): View
    {
        $data['driver'] = Driver::findOrFail($id);
        $data['owners'] = Owner::latest()->get();
        $data['bloods'] = BloodGroup::latest()->get();
        return view('backend.driver.edit', $data);
    }
    public function update_store(DriverRequest $request, $id): RedirectResponse
    {
        $update = Driver::findOrFail($id);

        

        $update->name = $request->name;
        $update->description = $request->description;
        $update->designation = $request->designation;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->owner_id = $request->owner_id;
        $update->driving_license = $request->driving_license;
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
        $path = $image->storeAs("driver/", $filename, 'public');
        $update->image = $path;

        $update->save();
        return redirect()->route('driver.index');
    }
    public function status($id): RedirectResponse
    {
        $driver = Driver::findOrFail($id);
        if($driver->status == 1){
            $driver->status = 0;
        }else{
            $driver->status = 1;
        }

        $driver->save();
        return redirect()->route('driver.index');
    }
    public function delete($id): RedirectResponse
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();

        return redirect()->route('driver.index');
    }
    // public function detalis($id): View
    // {
    //     $data['driver'] = Driver::findOrFail($id);
    //     $data['owners'] = Owner::latest()->get();
    //     return view('backend.driver.show', $data);
    // }
    public function detalis($id): View
{
    $data['driver'] = Driver::with('owner')->findOrFail($id); // ড্রাইভার সহ মালিকের ডেটা লোড
    $data['owners'] = Owner::latest()->get();
    return view('backend.driver.show', $data);
}

}
