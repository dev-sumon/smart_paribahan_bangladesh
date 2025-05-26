<?php

namespace App\Http\Controllers\FieldWorker;

use App\Models\Owner;
use App\Models\Stand;
use App\Models\Thana;
use App\Models\Union;
use App\Models\Vehicle;
use App\Models\District;
use App\Models\Division;
use Illuminate\View\View;
use App\Models\BloodGroup;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\OwnerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class FieldWorkerOwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('field_worker');
    }
    public function index(): View
    {
        $data['owners'] = Owner::latest()->get();
        return view('field_worker.owner.index', $data);
    }
    public function create(): View
    {
        $data['divisions'] = Division::with(['districts', 'thanas', 'unions', 'stands'])->latest()->get();
        $data['bloods'] = BloodGroup::latest()->get();
        return view('field_worker.owner.create', $data);
    }
    public function store(OwnerRequest $request): RedirectResponse
    {
        $save = new Owner();
        $save->title = $request->title;

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;

        while (Owner::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $save->slug = $slug;
        $save->designation = $request->designation;
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

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("owner/", $filename, 'public');
            $save->image = $path;
        }

        $save->save();

        if ($request->vehicle_id) {
            Vehicle::where('id', $request->vehicle_id)->update(['owner_id' => $save->id]);
        }

        return redirect()->route('field_worker.owner.index');
    }
    public function update($slug): View
    {
        $data['owner'] = Owner::with('division', 'district', 'thana', 'union', 'stand', 'vehicle')->where('slug', $slug)->firstOrFail();
        $data['divisions'] = Division::all();
        $data['districts'] = District::where('division_id', $data['owner']->division_id)->get();
        $data['thanas'] = Thana::where('district_id', $data['owner']->district_id)->get();
        $data['unions'] = Union::where('thana_id', $data['owner']->thana_id)->get();
        $data['stands'] = Stand::where('id', $data['owner']->stand_id)->get();
        $data['vehicles'] = Vehicle::where('id', $data['owner']->vehicle_id)->get();
        $data['bloods'] = BloodGroup::latest()->get();

        return view('field_worker.owner.edit', $data);
    }

    public function update_store(OwnerRequest $request, $slug): RedirectResponse
    {
        $update = Owner::where('slug', $slug)->firstOrFail();

        $update->title = $request->title;

        if ($update->isDirty('title')) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $count = 1;

            while (Owner::where('slug', $slug)->where('id', '!=', $update->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $update->slug = $slug;
        }

        $update->designation = $request->designation;
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

        if ($request->password) {
            $update->password = $request->password;
        }

        if ($request->hasFile('image')) {
            if ($update->image && Storage::exists($update->image)) {
                Storage::delete($update->image);
            }

            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("owner/", $filename, 'public');
            $update->image = $path;
        }

        $update->update();

        if ($request->vehicle_id) {
            Vehicle::where('id', $request->vehicle_id)->update(['owner_id' => $update->id]);
        }

        return redirect()->route('field_worker.owner.index');
    }
}
