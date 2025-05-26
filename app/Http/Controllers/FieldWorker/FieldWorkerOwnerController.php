<?php

namespace App\Http\Controllers\FieldWorker;

use App\Models\Owner;
use App\Models\Vehicle;
use App\Models\Division;
use Illuminate\View\View;
use App\Models\BloodGroup;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\OwnerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

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
}
