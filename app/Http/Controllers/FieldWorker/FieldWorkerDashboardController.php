<?php

namespace App\Http\Controllers\FieldWorker;

use App\Models\Blog;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\Division;
use App\Models\BloodGroup;
use App\Models\FieldWorker;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\FieldWorkRequest;
use Illuminate\Support\Facades\Storage;

class FieldWorkerDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('field_worker');
    }

    public function dashboard(){
        $data['worker'] = Auth::guard('field_worker')->user();
        return view('field_worker.dashboard', $data);
    }
    public function updateDashboard(FieldWorkRequest $request, $id): RedirectResponse
    {
        $update = FieldWorker::findOrFail($id);

        $update->name = $request->name;
        $update->phone = $request->phone;
        $update->email = $request->email;
        $update->nid = $request->nid;
        $update->father_name = $request->father_name;
        $update->mother_name = $request->mother_name;
        $update->address = $request->address;


        if ($request->hasFile('image')) {
            if ($update->image && Storage::exists($update->image)) {
                Storage::delete($update->image);
            }
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("worker/", $filename, 'public');
            $update->image = $path;
        }

        $update->update();
        return redirect()->route('f.home');
    }
    public function index(): View
    {
        return view('field_worker.pages.index');
    }
    public function driverCreate(): View
    {
        $data['divisions'] = Division::with( ['districts', 'thanas', 'unions', 'stands', 'owners'])->latest()->get();
        $data['bloods'] = BloodGroup::latest()->get();
        return view('field_worker.pages.driver', $data);
    }
    public function driverStore(DriverRequest $request)
    {
        $save = new Driver();

        $save->name = $request->name;
        $save->description = $request->description;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->owner_id = $request->owner_id;
        $save->blood_group_id = $request->blood_group_id;
        $save->division_id = $request->division_id;
        $save->district_id = $request->district_id;
        $save->thana_id = $request->thana_id;
        $save->union_id = $request->union_id;
        $save->vehicle_id = $request->vehicle_id;
        $save->stand_id = $request->stand_id;
        $save->driving_license = $request->driving_license;
        $save->password = Hash::make($request->password);
    
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = $request->name . time(). '.' .$image->getClientOriginalExtension();
            $path = $image->storeAs("driver/", $filename, 'public');
            $save->image = $path;
        }
        
        $save->save();

        if ($request->vehicle_id) {
            Vehicle::where('id', $request->vehicle_id)->update(['driver_id' => $save->id]);
        }

        return redirect()->route('f.home');
    }
    public function blogCreate(): View
    {
        return view('field_worker.pages.blog');
    }
    public function blogStore(BlogRequest $request): RedirectResponse
    {
        $save = new Blog();
        $save->title = $request->title;
        $save->description = $request->description;
        $save->creator = auth('admin')->user()->name;
        $save->status = $request->status ?? 1;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $request->name . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs("blog/", $filename, 'public');
            $save->image = $path;
        }

        $save->save();
        return redirect()->route('f.blog.index');
    }
}
