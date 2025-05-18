<?php

namespace App\Http\Controllers\Backend;

use App\Models\Owner;
use App\Models\Stand;
use App\Models\Thana;
use App\Models\Union;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\District;
use App\Models\Division;
use App\Models\BloodGroup;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;
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
        $data['divisions'] = Division::with(['districts', 'thanas', 'unions', 'stands', 'owners'])->latest()->get();
        $data['bloods'] = BloodGroup::latest()->get();
        return view('backend.driver.create', $data);
    }
    public function store(DriverRequest $request): RedirectResponse
    {
        $save = new Driver();

        $save->title = $request->title;
        // $save->slug = $request->slug;
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;

        while (Driver::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $save->slug = $slug;
        $save->description = $request->description;
        $save->designation = $request->designation;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->owner_id = $request->owner_id;
        $save->driving_license = $request->driving_license;
        $save->blood_group_id = $request->blood_group_id;
        $save->division_id = $request->division_id;
        $save->district_id = $request->district_id;
        $save->thana_id = $request->thana_id;
        $save->union_id = $request->union_id;
        $save->vehicle_id = $request->vehicle_id;
        $save->stand_id = $request->stand_id;
        $save->password = $request->password;
        $save->status = $request->status ?? 0;


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("driver/", $filename, 'public');
            $save->image = $path;
        }

        $save->save();

        if ($request->vehicle_id) {
            Vehicle::where('id', $request->vehicle_id)->update(['driver_id' => $save->id]);
        }


        return redirect()->route('driver.index');
    }
    public function update($slug): View
    {
        $data['driver'] = Driver::with('division', 'district', 'thana', 'union', 'stand', 'vehicle')->where('slug', $slug)->firstOrFail();
        $data['divisions'] = Division::all();
        $data['districts'] = District::where('division_id', $data['driver']->division_id)->get();
        $data['thanas'] = Thana::where('district_id', $data['driver']->district_id)->get();
        $data['unions'] = Union::where('thana_id', $data['driver']->thana_id)->get();
        $data['stands'] = Stand::where('id', $data['driver']->stand_id)->get();
        $data['vehicles'] = Vehicle::where('id', $data['driver']->vehicle_id)->get();
        $data['bloods'] = BloodGroup::latest()->get();
        return view('backend.driver.edit', $data);
    }
    public function update_store(DriverRequest $request, $slug): RedirectResponse
    {
        $update = Driver::where('slug',$slug)->firstOrFail();
        $update->title = $request->title;

        if ($update->isDirty('title')) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $count = 1;

            while (Driver::where('slug', $slug)->where('id', '!=', $update->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $update->slug = $slug;
        }

        $update->description = $request->description;
        $update->designation = $request->designation;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->owner_id = $request->owner_id;
        $update->driving_license = $request->driving_license;
        $update->blood_group_id = $request->blood_group_id;
        $update->division_id = $request->division_id;
        $update->district_id = $request->district_id;
        $update->thana_id = $request->thana_id;
        $update->union_id = $request->union_id;
        $update->vehicle_id = $request->vehicle_id;
        $update->stand_id = $request->stand_id;
        $update->status = $request->status ?? 0;

        if ($request->password) {
            $update->password = $request->password;
        }


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

        if ($request->vehicle_id) {
            Vehicle::where('id', $request->vehicle_id)->update(['driver_id' => $update->id]);
        }

        return redirect()->route('driver.index');
    }
    public function status($slug): RedirectResponse
    {
        $driver = Driver::where('slug',$slug)->firstOrFail();
        if ($driver->status == 1) {
            $driver->status = 0;
        } else {
            $driver->status = 1;
        }

        $driver->save();
        return redirect()->route('driver.index');
    }
    public function delete($slug): RedirectResponse
    {
        $driver = Driver::where('slug',$slug)->firstOrFail();
        $driver->delete();

        return redirect()->route('driver.index');
    }
    public function detalis($slug): View
    {
        $data['driver'] = Driver::with('owner')->where('slug',$slug)->firstOrFail();;
        $data['owners'] = Owner::latest()->get();
        return view('backend.driver.show', $data);
    }

}
