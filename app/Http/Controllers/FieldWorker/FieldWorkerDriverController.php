<?php

namespace App\Http\Controllers\FieldWorker;

use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\Division;
use Illuminate\View\View;
use App\Models\BloodGroup;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;
use Illuminate\Http\RedirectResponse;

class FieldWorkerDriverController extends Controller
{
    public function __construct()
    {
        $this->middleware('field_worker');
    }
    public function index(): View
    {
        $data['drivers'] = Driver::latest()->get();
        return view('field_worker.driver.index', $data);
    }
        public function create(): View
    {
        $data['divisions'] = Division::with(['districts', 'thanas', 'unions', 'stands', 'owners'])->latest()->get();
        $data['bloods'] = BloodGroup::latest()->get();
        return view('field_worker.driver.create', $data);
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


        return redirect()->route('field_worker.driver.index');
    }
}
